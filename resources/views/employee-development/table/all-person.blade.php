<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @php
                    $i = 0;
                @endphp
                <table id="example1" class="table table-hover">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Periode - Tahun</th>
                            <th>Nama</th>
                            <th>Total Terlambat</th>
                            <th>PA Murni</th>
                            <th>Kontribusi</th>
                            <th>Total PA</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employeeDevelopmentDepartments as $pk)                           
                            <tr>                                
                               <td>{{ ++$i }}</td>
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
