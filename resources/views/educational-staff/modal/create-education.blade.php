<div class="modal fade" id="createEducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Pengajuan Proposal Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Nama Proposal</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Tema Kegiatan</label>
                                    <input type="text" class="form-control" name="tema_kegiatan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" maxlength="10"
                                        required>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12 column">
                                    <table class="table table-bordered table-hover" id="tab_dynamic">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th class="text-center">
                                                    Pilih Panitia
                                                </th>
                                                <th class="text-center">
                                                    Pilih Peran Panitia
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id='pendidikan0'>
                                                <td>
                                                    1
                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr id='pendidikan1'></tr>
                                        </tbody>
                                    </table>
                                    <script>
                                        $(document).ready(function() {
                                            var i = 1;
                                            $("#add_row6").click(function() {
                                                $('#pendidikan' + i).html("<td>" + (i + 1) +
                                                    "</td><td><select class='form-control' name='kepanitiaan_user_id[" +
                                                    i +
                                                    "]' required><option selected disabled value=''>== Pilih Panitia ==</option></select></td><td><select class='form-control' name='kepanitiaan_position[" +
                                                    i +
                                                    "]' required><option selected disabled value=''>== Pilih Peran kepanitiaan ==</option></select></td>"
                                                );

                                                $('#tab_dynamic').append('<tr id="pendidikan' + (i + 1) + '"></tr>');
                                                i++;
                                            });
                                            $("#delete_row6").click(function() {
                                                if (i > 1) {
                                                    $("#pendidikan" + (i - 1)).html('');
                                                    i--;
                                                }
                                            });

                                        });
                                    </script>
                                </div>
                            </div>
                            <span>
                                <a id="add_row6" class="btn btn-warning"><i class="fas fa-plus"></i></a>
                                <a id='delete_row6' class="btn btn-primary"><i class="fas fa-trash"></i></a>
                            </span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>
