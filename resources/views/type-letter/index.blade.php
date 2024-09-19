@extends('layouts.dashboard')

@section('template_title')
    Tipe Surat
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               <i class="fas fa-envelope-square text-primary"></i> Tipe Surat
                            </span>

                            <div class="float-right">
                                <a href="#" data-toggle="modal" data-target="#createTypeLetter"
                                    class="btn btn-success btn-sm float-right" data-placement="left">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                            @include('type-letter.modal.create')
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
                                    @foreach ($typeLetters as $typeLetter)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $typeLetter->name }}</td>

                                            <td>
                                                <form action="{{ route('admin.type-letters.destroy',$typeLetter->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $typeLetters->links() !!}
            </div>
        </div>
    </div>
@endsection
