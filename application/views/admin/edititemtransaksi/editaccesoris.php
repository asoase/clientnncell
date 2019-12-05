<div class="modal-header">
  <h5 class="modal-title">EDIT <?=$namatransaksi;?></h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="javascript:submitedit(<?=$tipetransaksi . ',' . $iditem?>)" class="needs-validation formedit">
  <div class="modal-body">
    <h5 class="modal-title text-center mb-2"><?=$detailitem['nama'];?></h5>
    <div class="formclass my-0">
      <div class="form-group row my-0">
        <label for="formGroupnama" class="col-4 col-form-label col-form-label-sm">Nama Barang</label>
        <div class="col-8">
          <input type="text" class="inputform form-control form-control-sm" value="<?=$detailitem['nama'];?>" id="formGroupnama" placeholder="masukkan merk" required>
        </div>
      </div>
      <div class="form-group row my-0">
        <label for="formGrouptanggal" class="col-4 col-form-label col-form-label-sm">Tanggal</label>
        <div class="col-8">
          <input type="date" class="inputform form-control form-control-sm" value="<?=$detailitem['tanggal'];?>" id="formGrouptanggal" placeholder="masukkan tanggal" required>
        </div>
      </div>
      <div class="form-group row my-0">
        <label for="formGroupharga" class="col-4 col-form-label col-form-label-sm">Harga</label>
        <div class="col-8">
          <input type="tel" class="inputform inputcurrency form-control form-control-sm" value="<?='Rp. ' . number_format($detailitem['harga'], 2, ',', '.');?>" id="formGroupbiaya" placeholder="masukkan harga awal" pattern="^(Rp\. )?(?!0)((([0-9]{1,3}\.([0-9]{3}\.)*)[0-9]{3}|[0-9]{1,3})?(,00))$" data-a-sign="Rp. " data-a-dec="," data-a-sep="." data-lZero="deny" data-wEmpty="sign" required>
        </div>
      </div>
      <div class="form-group row my-0">
        <label for="formGroupcatatan" class="col-4 col-form-label col-form-label-sm">Catatan</label>
        <div class="col-8">
          <textarea class="inputform form-control form-control-sm"  id="formGroupcatatan" rows="3" placeholder="masukkan catatan"><?=$detailitem['catatan'];?></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-sm btn-success py-0 rounded submitedititem" data-tipetransaksi='<?=$tipetransaksi;?>' data-iditem='<?=$iditem;?>'>Edit</button>
  </div>
</form>