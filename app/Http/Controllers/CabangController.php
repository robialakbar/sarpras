<?php

namespace App\Http\Controllers;

use App\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cabang::get();

        return view('cabang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cabang::create(['cabang' => $request->cabang]);

        toastr()->success('Data Telah Tersimpan', 'success!');
        return redirect(action('CabangController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Cabang::findOrFail($id);

        return view('cabang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['cabang'] = $request->cabang;
        Cabang::where('id', $id)->update($data);

        toastr()->success('Data Telah Tersimpan', 'success!');
        return redirect(action('CabangController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Cabang::find($id);
        $data->delete();
        $result['code'] = '200';
        return response()->json($result);
    }
}
