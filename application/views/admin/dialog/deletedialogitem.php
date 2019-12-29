<div class="modal-header">
  <h5 class="modal-title">Yakin Ingin Menghapus?</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <p class="py-0 my-0"><strong><u><?=strtoupper($namatransaksi);?></u></strong></p>
  <pre class="py-0 my-0"><?=strtoupper($namaitem);?></pre>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-sm btn-danger py-0 submithapus" data-tipetransaksi='<?=$tipetransaksi;?>' data-iditem='<?=$iditem;?>'>Ya, Hapus !</button>
  <button type="button" class="btn btn-sm btn-secondary py-0" data-dismiss="modal">batal</button>
</div>