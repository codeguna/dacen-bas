<div class="modal fade" id="kesediaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mx-auto" role="document">
        <div class="modal-content" style="width: 1024px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-clock    "></i> Jam Kesediaan Bekerja
                </h5>
            </div>
            <div class="modal-body">
                <div id="pagu">
                    <div class="card card-body">
                        <div class="row">
                            <div class="alert alert-info w-100" role="alert">
                                <strong>
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Berlaku dari tanggal {{
                                    $expDate->start_date }} s/d {{ $expDate->end_date }}
                                    </strong>
                                    <br><small>Untuk perubahan jam kesediaan, silahkan hubungi Departemen BAS</small>
                            </div>
                            @foreach ($myWillingness as $willingness)
                            <div class="col-md-6">
                                <div class="table-responsive table-hover table-sm">
                                    <table class="table table-striped table-sm" style="overflow-y: scroll">
                                        <thead>
                                            <tr align="center">
                                                <th colspan="3" scope="col">
                                                    @switch($willingness->day_code)
                                                    @case(1)
                                                    Senin
                                                    @break
                                                    @case(2)
                                                    Selasa
                                                    @break
                                                    @case(3)
                                                    Rabu
                                                    @break
                                                    @case(4)
                                                    Kamis
                                                    @break
                                                    @case(5)
                                                    Jumat
                                                    @break
                                                    @case(6)
                                                    Sabtu
                                                    @break
                                                    @default

                                                    @endswitch
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr align="center">
                                                <td scope="row">
                                                    <i class="fa fa-arrow-down text-success" aria-hidden="true"></i>
                                                </td>
                                                <td>{{ $willingness->time_of_entry }}</td>
                                            </tr>
                                            <tr align="center">
                                                <td scope="row">
                                                    <i class="fa fa-arrow-up text-primary" aria-hidden="true"></i>
                                                </td>
                                                <td>{{ $willingness->time_of_return }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i>
                    Close</button>
            </div>
        </div>
    </div>
</div>