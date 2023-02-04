<?php

namespace App\Http\Controllers;

use App\BarangNew;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $barang = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->when($request->has('tahun') && !empty($request->tahun), function ($q) {
            $q->where('tahun_anggaran', 'like', '%' . request()->tahun . '%');
        })->get();
        $tahun = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->groupBy('tahun_anggaran')->pluck('tahun_anggaran');

        $baik = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->selectRaw('count(*) as jumlah, tahun_anggaran')->where('kondisi_barang', 'Baik')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->groupBy('tahun_anggaran')->pluck('jumlah', 'tahun_anggaran')->toArray();
        $rusakRingan = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->selectRaw('count(*) as jumlah,tahun_anggaran')->where('kondisi_barang', 'Rusak Ringan')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->groupBy('tahun_anggaran')->pluck('jumlah', 'tahun_anggaran')->toArray();
        $rusakBerat = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->selectRaw('count(*) as jumlah,tahun_anggaran')->where('kondisi_barang', 'Rusak Berat')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->groupBy('tahun_anggaran')->pluck('jumlah', 'tahun_anggaran')->toArray();
        $jumlahBaik = $jumlahRusakRingan = $jumlahRusakBerat = [];
        foreach ($tahun as $key => $value) {

            if (in_array($value, array_keys($baik))) {
                $jumlahBaik[] = $baik[$value];
                // dd($baik[$value],array_keys($baik), $rusakBerat, $rusakRingan, $value);
            } else {
                $jumlahBaik[] = 0;
            }

            if (in_array($value, array_keys($rusakRingan))) {
                $jumlahRusakRingan[] = $rusakRingan[$value];
                // dd($baik[$value],array_keys($baik), $rusakBerat, $jumlahRusakRingan, $value);
            } else {
                $jumlahRusakRingan[] = 0;
            }

            if (in_array($value, array_keys($rusakBerat))) {
                $jumlahRusakBerat[] = $rusakBerat[$value];
                // dd($baik[$value],array_keys($baik), $jumlahRusakBerat, $rusakRingan, $value);
            } else {
                $jumlahRusakBerat[] = 0;
            }
        }

        $jumlahBaik = json_encode($jumlahBaik);
        $jumlahRusakRingan = json_encode($jumlahRusakRingan);
        $jumlahRusakBerat = json_encode($jumlahRusakBerat);

        $chartJumlahBaik = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->selectRaw('count(*) as jumlah')->when($request->has('tahun') && !empty($request->tahun), function ($q) {
            $q->where('tahun_anggaran', 'like', '%' . request()->tahun . '%');
        })->where('kondisi_barang', 'Baik')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->groupBy('tahun_anggaran')->pluck('jumlah');
        $chartJumlahRusakRingan = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->selectRaw('count(*) as jumlah')->when($request->has('tahun') && !empty($request->tahun), function ($q) {
            $q->where('tahun_anggaran', 'like', '%' . request()->tahun . '%');
        })->where('kondisi_barang', 'Rusak Ringan')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->groupBy('tahun_anggaran')->pluck('jumlah');
        $chartJumlahRusakBerat = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->selectRaw('count(*) as jumlah')->when($request->has('tahun') && !empty($request->tahun), function ($q) {
            $q->where('tahun_anggaran', 'like', '%' . request()->tahun . '%');
        })->where('kondisi_barang', 'Rusak Berat')->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })->groupBy('tahun_anggaran')->pluck('jumlah');

        $kategoriBarang = BarangNew::leftjoin('users', 'barang_news.created_by', 'users.id')->selectRaw('count(*) as jumlah, subkelompok_barang')->when($request->has('tahun') && !empty($request->tahun), function ($q) {
            $q->where('tahun_anggaran', 'like', '%' . request()->tahun . '%');
        })->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
            $q->where('cabang_id', auth()->user()->cabang_id);
        })
            ->groupBy('subkelompok_barang')->orderBy('jumlah', 'desc')->pluck('jumlah', 'subkelompok_barang');
        $labelBarang = [];
        $jumlahBarang = [];
        $i = 1;
        foreach ($kategoriBarang as $key => $value) {
            if ($i >= 10) {
                $labelBarang['other'][] = $value;
            } else {
                $labelBarang[$key][] = $value;
            }
            $i++;
        }

        foreach ($labelBarang as $key => $value) {
            $jumlahBarang[] = array_sum($value);
        }
        $labelChart3 = json_encode(array_keys($labelBarang));
        $dataChart3 = json_encode($jumlahBarang);
        // dd(array_keys($kategoriBarang));
        $dataChart2 = json_encode([$chartJumlahBaik->sum(), $chartJumlahRusakRingan->sum(), $chartJumlahRusakBerat->sum()]);
        // dd(json_encode($dataChart2));
        // $labels = BarangNew::groupBy('tahun_anggaran')

        return view('user.home', compact('barang', 'tahun', 'jumlahBaik', 'jumlahRusakRingan', 'jumlahRusakBerat', 'dataChart2', 'labelChart3', 'dataChart3', 'kategoriBarang'));
        //     }else{
        //         return view('pembimbing.dashboard_pem');
        //     }
    }
}
