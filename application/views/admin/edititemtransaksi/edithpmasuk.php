<div class="modal-header">
	<h5 class="modal-title">EDIT <?= $namatransaksi; ?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<h5 class="modal-title text-center mb-2"><?= $detailitem['merk'].' '.$detailitem['tipe'].' ('.$detailitem['imei'].')';?></h5>
	<div class="formclass my-0">
		<div class="form-group row my-0">
			<label for="formGroupmerk" class="col-3 col-form-label col-form-label-sm">Merk</label>
			<div class="col-9">
				<input type="text" class="form-control form-control-sm" value="<?= $detailitem['merk']; ?>" id="formGroupmerk" placeholder="masukkan merk">
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGrouptipe" class="col-3 col-form-label col-form-label-sm">Tipe</label>
			<div class="col-9">
				<input type="text" class="form-control form-control-sm" value="<?= $detailitem['tipe']; ?>" id="formGrouptipe" placeholder="masukkan tipe">
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupimei" class="col-3 col-form-label col-form-label-sm">imei</label>
			<div class="col-9">
				<input type="tel" class="form-control form-control-sm" value="<?= $detailitem['imei']; ?>" id="formGroupimei" placeholder="masukkan imei">
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGrouptanggal" class="col-3 col-form-label col-form-label-sm">Tanggal</label>
			<div class="col-9">
				<input type="date" class="form-control form-control-sm" value="<?= $detailitem['tanggal']; ?>" id="formGrouptanggal" placeholder="masukkan tanggal">
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupram" class="col-3 col-form-label col-form-label-sm">RAM</label>
			<div class="col-9">
				<select class="custom-select custom-select-sm" id="formGroupram">
					<?php $indexselect = 0; ?>
					<?php foreach ($menuadmin['ram'] as $value) {?>
						<?php if($indexselect == $selectmenuindex[2]) { ?>
							<option value="$value" selected><?= $value['ram']; ?></option>
						<?php } else { ?>
							<option value="$value"><?= $value['ram']; ?></option>
						<?php } ?>
						<?php $indexselect += 1; ?>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGrouprom" class="col-3 col-form-label col-form-label-sm">ROM</label>
			<div class="col-9">
				<select class="custom-select custom-select-sm" id="formGrouprom">
					<?php $indexselect = 0; ?>
					<?php foreach ($menuadmin['rom'] as $value) {?>
						<?php if($indexselect == $selectmenuindex[3]) { ?>
							<option value="$value" selected><?= $value['rom']; ?></option>
						<?php } else { ?>
							<option value="$value"><?= $value['rom']; ?></option>
						<?php } ?>
						<?php $indexselect += 1; ?>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupjaringan" class="col-3 col-form-label col-form-label-sm">Jaringan</label>
			<div class="col-9">
				<select class="custom-select custom-select-sm" id="formGroupjaringan">
					<?php $indexselect = 0; ?>
					<?php foreach ($menuadmin['jaringan'] as $value) {?>
						<?php if($indexselect == $selectmenuindex[0]) { ?>
							<option value="$value" selected><?= $value['jaringan']; ?></option>
						<?php } else { ?>
							<option value="$value"><?= $value['jaringan']; ?></option>
						<?php } ?>
						<?php $indexselect += 1; ?>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupgaransi" class="col-3 col-form-label col-form-label-sm">Garansi</label>
			<div class="col-9">
				<select class="custom-select custom-select-sm" id="formGroupgaransi">
					<?php $indexselect = 0; ?>
					<?php foreach ($menuadmin['garansi'] as $value) {?>
						<?php if($indexselect == $selectmenuindex[1]) { ?>
							<option value="$value" selected><?= $value['garansi']; ?></option>
						<?php } else { ?>
							<option value="$value"><?= $value['garansi']; ?></option>
						<?php } ?>
						<?php $indexselect += 1; ?>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupharga" class="col-3 col-form-label col-form-label-sm">Harga</label>
			<div class="col-9">
				<input type="text" class="form-control form-control-sm" value="<?= number_format($detailitem['harga'], 0, '', '.'); ?>" id="formGroupharga" placeholder="masukkan harga">
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupkelengkapan" class="col-3 col-form-label col-form-label-sm">Kelengkapan</label>
			<div class="col-9">
				<select class="custom-select custom-select-sm" id="formGroupkelengkapan">
					<?php $indexselect = 0; ?>
					<?php foreach ($menuadmin['kelengkapan'] as $value) {?>
						<?php if($indexselect == $selectmenuindex[4]) { ?>
							<option value="$value" selected><?= $value['kelengkapan']; ?></option>
						<?php } else { ?>
							<option value="$value"><?= $value['kelengkapan']; ?></option>
						<?php } ?>
						<?php $indexselect += 1; ?>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupkerusakan" class="col-3 col-form-label col-form-label-sm">Kerusakan</label>
			<div class="col-9">
				<input type="text" class="form-control form-control-sm" value="<?= $detailitem['kerusakan']; ?>" id="formGroupkerusakan" placeholder="masukkan kerusakan">
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupsales" class="col-3 col-form-label col-form-label-sm">Sales</label>
			<div class="col-9">
				<select class="custom-select custom-select-sm" id="formGroupsales">
					<?php $indexselect = 0; ?>
					<?php foreach ($menuadmin['sales'] as $value) {?>
						<?php if($indexselect == $selectmenuindex[5]) { ?>
							<option value="$value" selected><?= $value['sales']; ?></option>
						<?php } else { ?>
							<option value="$value"><?= $value['sales']; ?></option>
						<?php } ?>
						<?php $indexselect += 1; ?>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row my-0">
			<label for="formGroupcatatan" class="col-3 col-form-label col-form-label-sm">Catatan</label>
			<div class="col-9">
				<input type="text" class="form-control form-control-sm" value="<?= $detailitem['catatan']; ?>" id="formGroupcatatan" placeholder="masukkan catatan">
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-sm btn-success py-0 rounded submitedititem" data-tipetransaksi='<?= $tipetransaksi; ?>' data-iditem='<?= $iditem; ?>'>Edit</button>
</div>