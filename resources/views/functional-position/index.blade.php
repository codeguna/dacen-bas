@extends('layouts.dashboard')

@section('template_title')
    Jabatan Fungsional
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Jabatan Fungsional
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.functional-positions.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
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

                                        <th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($functionalPositions as $functionalPosition)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $functionalPosition->name }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.functional-positions.destroy', $functionalPosition->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.functional-positions.show', $functionalPosition->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.functional-positions.edit', $functionalPosition->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('users_manage')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $functionalPositions->links() !!}
            </div>
        </div>
    </div>
@endsection
