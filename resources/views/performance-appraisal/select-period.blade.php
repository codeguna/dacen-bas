@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode | PA
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-search text-primary" aria-hidden="true"></i> Pilih Periode dan Tahun</h3>
                    </div>
                    <div class="card-body"> 
                        <form action="{{ route('admin.performance-appraisals.select-period') }}" method="GET">
                        <div class="row">                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bulan</label>
                                    <select class="form-control" name="period" required>
                                        <option disabled selected>== Pilih Bulan ==</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" id="implementation_year" name="year" class="form-control"
                                        min="0" max="9999"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                                        placeholder="Input 4-digit tahun" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-success w-100" type="submit">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                                </button>
                            </div>                        
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @php
                            $i =0;
                        @endphp
                        <table id="example1" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Periode - Tahun</th>
                                    <th>Nama</th>
                                    <th>Total Terlambat</th>
                                    <th>PA Murni</th>
                                    <th>Kontribusi</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($performanceAppraisals as $pa)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $pa->period }} - {{ $pa->year }}</td>
                                        <td>{{ $pa->user->name }}</td>
                                        <td>{{ $pa->late_total }}</td>
                                        <td>{{ $pa->pure_pa }}</td>
                                        <td>{{ $pa->contribution }}</td>
                                        <td>{{ $pa->note }}</td>
                                    </tr>
                                @empty
                                    <tr style="text-align: center">
                                        <td colspan="7">== data tidak ada ==</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
