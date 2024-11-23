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
                            <input class="form-control" type="number" min="0" name="pure_pa[${paCount}]" required>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="contribution[${contributionCount}]" required>
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
