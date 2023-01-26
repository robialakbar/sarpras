@extends('layouts.layout')
@section('content')
    <title>Edit Data Users</title>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Edit Data</h6>
    </div>
    <div class="card-body">
        <div class="x_content">
            <form action="{{ action('UserController@store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control" required placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="Masukan mail">

                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" required placeholder="Masukan Username">

                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Masukan Password">
                </div>
                <div class="form-group">
                    <label for="">Cabang</label>
                    <select name="cabang_id" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Cabang</option>
                        @foreach ($cabang as $k => $val)
                            <option value="{{ $k }}">{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="" class="form-control" required>
                        <option value="" disabled selected>Pilih Role</option>
                        @foreach ($role as $k => $val)
                            <option value="{{ $k }}">{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="level" value="admin">
                <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
@endsection
