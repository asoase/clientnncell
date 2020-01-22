<div class="container my-3">
  <div class="row justify-content-end">
    <div class="col-2 mx-3">
      <button class="btn btn-success btn-sm py-0 button-cari" data-toggle="modal" data-target="#detailModal">CARI</button>
    </div>
  </div>
</div>

<?php if (!$hasil['status']) {?>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <?php if (!is_null($type)) {?>
          <p>DATA TIDAK DITEMUKAN</p>
        <?php }?>
      </div>
    </div>
  </div>
<?php } else {?>
  <div class="container my-3">
    <?php $indextipe   = 1;?>
    <?php $isdataexist = false;?>
    <?php foreach ($tipeitem as $tipe) {?>
      <?php if (!is_null($hasil[$tipe])) {?>
        <?php $isdataexist = true;?>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="bg-white">
              <table class="table table-sm table-striped">
                <thead class="bg-info">
                  <tr>
                    <th scope="col" colspan="3"><?=$namaitem[$indextipe - 1];?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $indexitem = 1;?>
                  <?php foreach ($hasil[$tipe] as $item) {?>
                    <tr>
                      <th scope="row" style="width:10%"><?=$indexitem;?></th>
                      <?php if (($tipe == 'hp_in') || ($tipe == 'hp_out')) {?>
                        <td style="width:60%"><?=$item['merk'] . ' ' . $item['tipe'] . ' (' . $item['imei'] . ')';?></td>
                        <td><button class="btn btn-primary btn-sm py-0 d-block mx-auto detail-item" data-iditem="<?=$item['id'];?>" data-tipeitem="<?=$tipe;?>" data-toggle="modal" data-target="#detailModal">detail</button></td>
                      <?php } else if (($tipe == 'servis_out') || ($tipe == 'servis_return')) {?>
                        <td style="width:60%"><?=$item['merk'] . ' ' . $item['tipe'] . ' (' . $item['kerusakan'] . ')';?></td>
                        <td><button class="btn btn-primary btn-sm py-0 d-block mx-auto detail-item" data-iditem="<?=$item['id'];?>" data-tipeitem="<?=$tipe;?>" data-toggle="modal" data-target="#detailModal">detail</button></td>
                      <?php } else if ($tipe == 'accesoris') {?>
                        <td style="width:60%"><?=$item['nama'];?></td>
                        <td><button class="btn btn-primary btn-sm py-0 d-block mx-auto detail-item" data-iditem="<?=$item['id'];?>" data-tipeitem="<?=$tipe;?>" data-toggle="modal" data-target="#detailModal">detail</button></td>
                      <?php }?>
                    </tr>
                    <?php $indexitem += 1;?>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php }?>
      <?php $indextipe += 1;?>
    <?php }?>
    <?php if (!$isdataexist) {?>
      <?php if (!is_null($type)) {?>
        <p>DATA TIDAK DITEMUKAN</p>
      <?php }?>
    <?php }?>
  </div>
<?php }?>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content isimodal" id="isidetail">
    </div>
  </div>
</div>