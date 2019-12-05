<div class="modal-header">
	<h5 class="modal-title">EDIT <?=$namatransaksi;?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<form action="javascript:submitedit(<?=$tipetransaksi . ',' . $iditem?>)" class="needs-validation formedit">
	<div class="modal-body">
		<h5 class="modal-title text-center mb-2"><?=$detailitem['merk'] . ' ' . $detailitem['tipe'] . ' (' . $detailitem['imei'] . ')';?></h5>
		<div class="formclass my-0">
			<div class="form-group row my-0">
				<label for="formGroupmerk" class="col-3 col-form-label col-form-label-sm">Merk</label>
				<div class="col-9">
					<input type="text" class="inputform form-control form-control-sm" value="<?=$detailitem['merk'];?>" id="formGroupmerk" placeholder="masukkan merk" required>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGrouptipe" class="col-3 col-form-label col-form-label-sm">Tipe</label>
				<div class="col-9">
					<input type="text" class="inputform form-control form-control-sm" value="<?=$detailitem['tipe'];?>" id="formGrouptipe" placeholder="masukkan tipe" required>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupimei" class="col-3 col-form-label col-form-label-sm">imei</label>
				<div class="col-9">
					<input type="tel" class="inputform form-control form-control-sm" value="<?=$detailitem['imei'];?>" id="formGroupimei" placeholder="masukkan imei" required>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGrouptanggal" class="col-3 col-form-label col-form-label-sm">Tanggal</label>
				<div class="col-9">
					<input type="date" class="inputform form-control form-control-sm" value="<?=$detailitem['tanggal'];?>" id="formGrouptanggal" placeholder="masukkan tanggal" required>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupram" class="col-3 col-form-label col-form-label-sm">RAM</label>
				<div class="col-9">
					<select class="inputform custom-select custom-select-sm" id="formGroupram" required>
						<option disabled>- pilih ram -</option>
						<?php $indexselect = 0;?>
						<?php foreach ($menuadmin['ram'] as $value) {?>
							<?php if ($indexselect == $selectmenuindex[2]) {?>
								<option selected><?=$value['ram'];?></option>
							<?php } else {?>
								<option><?=$value['ram'];?></option>
							<?php }?>
							<?php $indexselect += 1;?>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGrouprom" class="col-3 col-form-label col-form-label-sm">ROM</label>
				<div class="col-9">
					<select class="inputform custom-select custom-select-sm" id="formGrouprom" required>
						<option disabled>- pilih rom -</option>
						<?php $indexselect = 0;?>
						<?php foreach ($menuadmin['rom'] as $value) {?>
							<?php if ($indexselect == $selectmenuindex[3]) {?>
								<option selected><?=$value['rom'];?></option>
							<?php } else {?>
								<option><?=$value['rom'];?></option>
							<?php }?>
							<?php $indexselect += 1;?>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupjaringan" class="col-3 col-form-label col-form-label-sm">Jaringan</label>
				<div class="col-9">
					<select class="inputform custom-select custom-select-sm" id="formGroupjaringan" required>
						<option disabled>- pilih jaringan -</option>
						<?php $indexselect = 0;?>
						<?php foreach ($menuadmin['jaringan'] as $value) {?>
							<?php if ($indexselect == $selectmenuindex[0]) {?>
								<option selected><?=$value['jaringan'];?></option>
							<?php } else {?>
								<option><?=$value['jaringan'];?></option>
							<?php }?>
							<?php $indexselect += 1;?>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupgaransi" class="col-3 col-form-label col-form-label-sm">Garansi</label>
				<div class="col-9">
					<select class="inputform custom-select custom-select-sm" id="formGroupgaransi" required>
						<option disabled>- pilih garansi -</option>
						<?php $indexselect = 0;?>
						<?php foreach ($menuadmin['garansi'] as $value) {?>
							<?php if ($indexselect == $selectmenuindex[1]) {?>
								<option selected><?=$value['garansi'];?></option>
							<?php } else {?>
								<option><?=$value['garansi'];?></option>
							<?php }?>
							<?php $indexselect += 1;?>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupharga" class="col-3 col-form-label col-form-label-sm">Harga</label>
				<div class="col-9">
					<input type="tel" class="inputform inputcurrency form-control form-control-sm" value="<?='Rp. ' . number_format($detailitem['harga'], 2, ',', '.');?>" id="formGroupharga" placeholder="masukkan harga" pattern="^(Rp\. )?(?!0)((([0-9]{1,3}\.([0-9]{3}\.)*)[0-9]{3}|[0-9]{1,3})?(,00))$" data-a-sign="Rp. " data-a-dec="," data-a-sep="." data-lZero="deny" data-wEmpty="sign" required>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupkelengkapan" class="col-3 col-form-label col-form-label-sm">Kelengkapan</label>
				<div class="col-9">
					<select class="inputform custom-select custom-select-sm" id="formGroupkelengkapan" required>
						<option disabled>- pilih kelangkapan -</option>
						<?php $indexselect = 0;?>
						<?php foreach ($menuadmin['kelengkapan'] as $value) {?>
							<?php if ($indexselect == $selectmenuindex[4]) {?>
								<option selected><?=$value['kelengkapan'];?></option>
							<?php } else {?>
								<option><?=$value['kelengkapan'];?></option>
							<?php }?>
							<?php $indexselect += 1;?>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupkerusakan" class="col-3 col-form-label col-form-label-sm">Kerusakan</label>
				<div class="col-9">
					<textarea type="text" class="inputform form-control form-control-sm" rows="3" id="formGroupkerusakan" placeholder="masukkan kerusakan"><?=$detailitem['kerusakan'];?></textarea>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupsales" class="col-3 col-form-label col-form-label-sm">Sales</label>
				<div class="col-9">
					<select class="inputform custom-select custom-select-sm" id="formGroupsales" required>
						<option disabled>- pilih sales -</option>
						<?php $indexselect = 0;?>
						<?php foreach ($menuadmin['sales'] as $value) {?>
							<?php if ($indexselect == $selectmenuindex[5]) {?>
								<option selected><?=$value['sales'];?></option>
							<?php } else {?>
								<option><?=$value['sales'];?></option>
							<?php }?>
							<?php $indexselect += 1;?>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row my-0">
				<label for="formGroupcatatan" class="col-3 col-form-label col-form-label-sm">Catatan</label>
				<div class="col-9">
					<textarea class="inputform form-control form-control-sm"  id="formGroupcatatan" rows="3" placeholder="masukkan catatan"><?=$detailitem['catatan'];?></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-sm btn-success py-0 rounded submitedititem" data-tipetransaksi='<?=$tipetransaksi;?>' data-iditem='<?=$iditem;?>'>Edit</button>
	</div>
</form>