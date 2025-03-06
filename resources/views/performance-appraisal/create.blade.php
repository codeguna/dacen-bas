@extends('layouts.dashboard')

@section('template_title')
    Import Nilai PA Karyawan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-upload text-primary"></i> Import Nilai PA Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.performance-appraisals.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('performance-appraisal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.performance-appraisals.destroy-bulk') }}" method="POST">

            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-trash text-danger" aria-hidden="true"></i> Hapus PA</h3>
                        </div>
                        <div class="card-body">
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
                                    <button class="btn btn-danger w-100" type="submit"
                                        onclick="return confirm('Hapus data PA ini?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Hapus?
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </section>
@endsection
@section('scripts')
    <script>
        function addRow() {
            const table = document.getElementById('paTable').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length;
            const pinCount = table.rows.length;
            const lateCount = table.rows.length;
            const paCount = table.rows.length;
            const contributionCount = table.rows.length;
            const noteCount = table.rows.length;
            const row = table.insertRow(rowCount);

            row.innerHTML = `
            <td>${rowCount + 1}</td>
            <td>
                                <select class="form-control" name="pin[${pinCount}]" required>
                                    <option disabled selected>== Pilih Nama ==</option>
                                    @foreach ($users as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach                                    
                                </select>
                        </td>
                        <td>
                           <input class="form-control" type="number" min="0" name="late_total[${lateCount}]" required>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="pure_pa[${paCount}]" step="any"
                                lang="id" required>
                                <small class="text-danger">Gunakan tanda koma (,)</small>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="contribution[${contributionCount}]" step="any"
                                lang="id"  required>
                            <small class="text-danger">Gunakan tanda koma (,)</small>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="note[${noteCount}]" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
        `;
        }

        function deleteRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Re-index row numbers
            const table = document.getElementById('paTable').getElementsByTagName('tbody')[0];
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[0].innerHTML = i + 1;
            }
        }
    </script>
@endsection
