@extends('layouts.dashboard')

@section('template_title')
    Kesediaan Saya
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        <strong>
                            <i class="fa fa-info-circle" aria-hidden="true"></i> Untuk perubahan jam kesediaan,
                            silahkan
                            hubungi Departemen BAS
                        </strong>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($myWillingness as $willingness)
                        <div class="col-md-4">
                            <div class="table-responsive table-hover table-sm">
                                <table class="table table-striped table-sm" style="overflow-y: scroll">
                                    <thead>
                                        <tr align="center">
                                            <th colspan="3" scope="col">
                                                @switch($willingness->day_code)
                                                    @case(1)
                                                        Senin
                                                    @break

                                                    @case(2)
                                                        Selasa
                                                    @break

                                                    @case(3)
                                                        Rabu
                                                    @break

                                                    @case(4)
                                                        Kamis
                                                    @break

                                                    @case(5)
                                                        Jumat
                                                    @break

                                                    @case(6)
                                                        Sabtu
                                                    @break

                                                    @default
                                                @endswitch
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr align="center">
                                            <td scope="row">
                                                <i class="fa fa-arrow-down text-success" aria-hidden="true"></i>
                                            </td>
                                            <td>{{ $willingness->time_of_entry }}</td>
                                        </tr>
                                        <tr align="center">
                                            <td scope="row">
                                                <i class="fa fa-arrow-up text-primary" aria-hidden="true"></i>
                                            </td>
                                            <td>{{ $willingness->time_of_return }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
