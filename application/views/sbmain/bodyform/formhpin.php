<form class="needs-validation" action="javascript:editsubmit()">
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Merk</label>
		<div class="col-sm-10">
			<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Merk" value="<?= $hpin['merk']; ?>" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipe</label>
		<div class="col-sm-10">
			<input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $hpin['tipe'] ?>" placeholder="Masukkan Tipe" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">imei</label>
		<div class="col-sm-10">
			<input type="tel" class="form-control form-control-sm" id="colFormLabelSm" pattern="[0-9]*" value="<?= $hpin['imei'] ?>" placeholder="Masukkan imei" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">jaringan</label>
		<div class="col-sm-10">
			<select class="custom-select custom-select-sm" id="selectFormsm">
				<option value="5G" <?= $selection['jaringan'][0] ?> >5G</option>
				<option value="4G" <?= $selection['jaringan'][1] ?>>4G</option>
				<option value="3G" <?= $selection['jaringan'][2] ?>>3G</option>
				<option value="E" <?= $selection['jaringan'][3] ?>>E</option>
				<option value="TANPA SIM" <?= $selection['jaringan'][4] ?>>TANPA SIM</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">garansi</label>
		<div class="col-sm-10">
			<select class="custom-select custom-select-sm" id="selectFormsm">
				<option value="tidak ada" <?= $selection['garansi'][0] ?>>tidak ada</option>
				<option value="distributor" <?= $selection['garansi'][1] ?>>distributor</option>
				<option value="resmi" <?= $selection['garansi'][2] ?>>resmi</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ram</label>
		<div class="col-sm-10">
			<select class="custom-select custom-select-sm" id="selectFormsm">
				<option value="0.25" <?= $selection['ram'][0] ?>>0.25</option>
				<option value="0.5" <?= $selection['ram'][1] ?>>0.5</option>
				<option value="1" <?= $selection['ram'][2] ?>>1</option>
				<option value="1.5" <?= $selection['ram'][3] ?>>1.5</option>
				<option value="2" <?= $selection['ram'][4] ?>>2</option>
				<option value="3" <?= $selection['ram'][5] ?>>3</option>
				<option value="4" <?= $selection['ram'][6] ?>>4</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">rom</label>
		<div class="col-sm-10">
			<select class="custom-select custom-select-sm" id="selectFormsm">
				<option value="4" <?= $selection['rom'][0] ?>>4</option>
				<option value="8" <?= $selection['rom'][1] ?>>8</option>
				<option value="16" <?= $selection['rom'][2] ?>>16</option>
				<option value="32" <?= $selection['rom'][3] ?>>32</option>
				<option value="64" <?= $selection['rom'][4] ?>>64</option>
				<option value="128" <?= $selection['rom'][5] ?>>128</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
		<div class="col-sm-10">
			<input type="number" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $hpin['harga'] ?>" placeholder="Masukkan Harga" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">kelengkapan</label>
		<div class="col-sm-10">
			<select class="custom-select custom-select-sm" id="selectFormsm">
				<option value="hp dus cas headset" <?= $selection['kelengkapan'][0] ?>>hp dus cas headset</option>
				<option value="hp dus cas" <?= $selection['kelengkapan'][1] ?>>hp dus cas</option>
				<option value="hp dus" <?= $selection['kelengkapan'][2] ?>>hp dus</option>
				<option value="hp cas" <?= $selection['kelengkapan'][3] ?>>hp cas</option>
				<option value="hp" <?= $selection['kelengkapan'][4] ?>>hp</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kerusakan</label>
		<div class="col-sm-10">
			<input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $hpin['kerusakan'] ?>" placeholder="Masukkan Kerusakan">
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Sales</label>
		<div class="col-sm-10">
			<input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $hpin['sales'] ?>" placeholder="Masukkan Sales" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Catatan</label>
		<div class="col-sm-10">
			<input type="text" class="form-control form-control-sm" id="colFormLabelSm" value="<?= $hpin['catatan'] ?>" placeholder="Masukkan Catatan (tidak harus diisi)">
		</div>
	</div>
	<button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
</form>