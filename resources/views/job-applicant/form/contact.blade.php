<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type">Tipe Nomor</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="1">Handphone(WA)</option>
                        <option value="2">Telepon</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" class="form-control" id="number" name="number" required maxlength="14" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14)">
                </div>                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
        </div>
    </div>
</div>
