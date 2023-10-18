@extends('layouts.dashboard')

@section('template_title')
    Update Profil
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Profile</h3>
                        <small class="text-danger">
                            Isi dengan sebenar-benar. Pengisian form ini hanya bisa dilakukan sekali
                        </small>
                    </div>
                    <div class="card-body">
                        {!! $errors->first(
                            'nomor_induk',
                            '<div class="alert alert-warning" role="alert">
                                                                                <i class="fa fa-info-circle" aria-hidden="true"></i> 
                                                                                <strong>NIP/NIDN sudah digunakan oleh pengguna lain.</strong>
                                                                                                </div>',
                        ) !!}
                        <form action="{{ route('admin.saveprofile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Posisi</label> <br>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-warning btn-xs">
                                            <input type="radio" name="position" value="Dosen"> Dosen
                                        </label>
                                        <label class="btn btn-success btn-xs">
                                            <input type="radio" name="position" value="Tendik"> Tendik
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomor Induk (NIP/NIDN)</label>
                                        <input type="text" class="form-control" name="nomor_induk"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        <small class="text-danger">NIP: untuk Tendik</small> |
                                        <small class="text-danger">NIDN: untuk Dosen</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
