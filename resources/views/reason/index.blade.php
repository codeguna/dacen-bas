@extends('layouts.dashboard')

@section('template_title')
    Reason
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reason') }}
                            </span>

                            <div class="float-right">
                                <a href="#" data-toggle="modal" data-target="#createReason"
                                    class="btn btn-success btn-sm float-right" data-placement="left">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                            @include('reason.modal.create')
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
                                    @foreach ($reasons as $reason)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $reason->name }}</td>

                                            <td>
                                                <form action="{{ route('admin.reasons.destroy', $reason->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.reasons.show', $reason->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reasons->links() !!}
            </div>
        </div>
    </div>
@endsection
