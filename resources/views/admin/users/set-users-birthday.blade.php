@extends('layouts.dashboard')

@section('template_title')
    Input Ulang Tahun Pengguna
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('admin.user.update-birthday') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::User()->name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Set Tanggal Lahir</label>
                                <input class="form-control" type="date" name="birthday" required>
                                <small class="form-text text-danger">*input tanggal lahir anda</small>
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
