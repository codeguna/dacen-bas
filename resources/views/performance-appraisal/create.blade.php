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
                        <form method="POST" action="{{ route('admin.performance-appraisals.store') }}"  role="form" enctype="multipart/form-data">
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
            const nameCount = table.rows.length;
            const identifyCount = table.rows.length;
            const affiliationCount = table.rows.length;
            const row = table.insertRow(rowCount);

            row.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type="text" class="form-control" name="name[${nameCount}]"></td>
            <td><input type="number" class="form-control" name="identity_number[${identifyCount}]"></td>            
            <td><input type="text" class="form-control" name="affiliation[${affiliationCount}]"></td>
            <td><button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></button></td>
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
