<div class="modal fade" id="presensiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.scan-log.proceed-import-scan') }}" enctype="multipart/form-data">
            <div class="modal-content" style="width: 800px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Presensi</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover" id="tab_logic">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Nama Pengguna
                                        </th>
                                        <th class="text-center">
                                            Waktu
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='presensi0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <select class="form-control" name="pin[0]" required>
                                                <option selected disabled>== Pilih Pengguna</option>
                                                @foreach ($users as $value => $key)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" type="datetime-local" name="scan[0]" required>
                                        </td>
                                    </tr>
                                    <tr id='presensi1'></tr>
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    var i = 1;
                                    $("#add_row").click(function() {
                                        $('#presensi' + i).html("<td>" + (i + 1) +
                                            "</td><td><select class='form-control' name='pin[" + i +
                                            "]' required> <option selected disabled>== Pilih Pengguna</option>@foreach ($users as $value => $key)<option value='{{ $key }}''>{{ $value }}</option>@endforeach</select></td><td><input class='form-control' type='datetime-local' name='scan[" +
                                            i + "]' required></td>"
                                        );

                                        $('#tab_logic').append('<tr id="presensi' + (i + 1) + '"></tr>');
                                        i++;
                                    });
                                    $("#delete_row").click(function() {
                                        if (i > 1) {
                                            $("#presensi" + (i - 1)).html('');
                                            i--;
                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>
                    <span>
                        <a id="add_row" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                        <a id='delete_row' class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"  onclick="return confirm('Proses import presensi ini? Jika sudah yakin klik OK?')"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
