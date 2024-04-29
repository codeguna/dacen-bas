@extends('layouts.dashboard')

@section('template_title')
    User Logs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            <i class="fa fa-clock text-primary" aria-hidden="true"></i> User Logs
                            </span>

                            <div class="float-right">
                                <form id="delete-form" method="POST" action="{{ route('admin.logs.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus semua data logs pengguna?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Browser</th>
                                        <th>OS</th>
                                        <th>IP</th>
                                        <th>Last Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log )
                                        <tr>
                                            <td>
                                                {{ ++$i }}
                                            </td>
                                            <td>
                                                {{ $log->user->name }}
                                            </td>
                                            <td>
                                                {{ $log->os }}
                                            </td>
                                            <td>
                                                {{ $log->browser }}
                                            </td>
                                            <td>
                                                {{ $log->ip }}
                                            </td>
                                            <td>
                                                {{ $log->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $logs->links() !!}
            </div>
        </div>
    </div>
@endsection
