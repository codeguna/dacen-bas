@extends('layouts.dashboard')

@section('template_title')
    Performance Appraisal
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Performance Appraisal') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.performance-appraisals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Pin</th>
										<th>Period</th>
										<th>Year</th>
										<th>Late Total</th>
										<th>Pure Pa</th>
										<th>Contribution</th>
										<th>Note</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($performanceAppraisals as $performanceAppraisal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $performanceAppraisal->pin }}</td>
											<td>{{ $performanceAppraisal->period }}</td>
											<td>{{ $performanceAppraisal->year }}</td>
											<td>{{ $performanceAppraisal->late_total }}</td>
											<td>{{ $performanceAppraisal->pure_pa }}</td>
											<td>{{ $performanceAppraisal->contribution }}</td>
											<td>{{ $performanceAppraisal->note }}</td>

                                            <td>
                                                <form action="{{ route('admin.performance-appraisals.destroy',$performanceAppraisal->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.performance-appraisals.show',$performanceAppraisal->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.performance-appraisals.edit',$performanceAppraisal->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $performanceAppraisals->links() !!}
            </div>
        </div>
    </div>
@endsection
