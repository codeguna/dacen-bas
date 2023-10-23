@extends('layouts.dashboard')

@section('template_title')
    Input PIN Pengguna
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('admin.user.update-pin', $user->id) }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-user-circle" aria-hidden="true"></i> {{ $user->name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Set PIN Pengguna</label>
                                <input type="text" class="form-control" name="pin" value="{{ $user->pin }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                                <small class="form-text text-danger">PIN harus sesuai dengan Mesin Fingerprint</small>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
