@extends('layouts.dashboard')

@section('template_title')
    Daftar Ketidakhadiran
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                              <i class="fa fa-calendar-minus text-danger" aria-hidden="true"></i>  Daftar Ketidakhadiran
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.not-scan-logs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
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
                                        <th>Tanggal</th>
										<th>Nama</th>
										<th>Alasan</th>
										<th>Note</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notScanLogs as $notScanLog)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ ++$notScanLog->date }}</td>                                            
											<td>{{ $notScanLog->user->name }}</td>
											<td>{{ $notScanLog->reason->name }}</td>
											<td>{{ $notScanLog->note }}</td>

                                            <td>
                                                <form action="{{ route('admin.not-scan-logs.destroy',$notScanLog->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.not-scan-logs.show',$notScanLog->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.not-scan-logs.edit',$notScanLog->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $notScanLogs->links() !!}
            </div>
        </div>
    </div>
@endsection
