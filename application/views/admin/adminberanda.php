<nav class="navbar navbar-light bg-light">
  <div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Menu
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="#">Detail Barang</a>
      <a class="dropdown-item" href="#">Rekap Data</a>
      <a class="dropdown-item" href="#">Edit Menu</a>
    </div>
  </div>
  <form class="form-inline" action="<?= base_url('admin/cari'); ?>">
    <div class="input-group">
      <input type="text" placeholder="Cari barang" id="searchinput" name="cari" required="true">
      <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
      </div>
    </div>
  </form>
</nav>

<!-- detail transaksi -->
<div class="container mt-4">
  <div class="row">

    <div class="col-lg-4 col-md-12 pb-2 cover-traksaksi">

      <div class="text-center">
        <h1>DATA TRANSAKSI</h1>
        <h6>Minggu <?= $data['allday'][0]; ?> - Sabtu <?= $data['allday'][6]; ?></h6>
      </div>

      <div class="accordion py-1" id="hari">
        <?php for ($i=0; $i < 7; $i++) { ?>
          <div class="mb-2 mt-1 shadow" id="item-transaksi">

            <div class="mb-0 d-flex justify-content-between align-items-center" id="tombol-accordion">
              <button type="button" class="btn btn-link py-0 font-weight-bold text-left mb-1" data-toggle="collapse" data-target="#collapse<?= $i; ?>"><?= $data['dayname'][$i].' '.$data['allday'][$i];?></button>
              <button type="button" class="btn btn-sm btn-danger py-0 font-weight-bold mr-1" data-toggle="collapse" data-target="#collapse<?= $i; ?>">lihat</button>
            </div>

            <div class="collapse" id="collapse<?= $i; ?>" data-parent="#hari">
              <div class="card card-body py-1 px-0">
                <?php for ($j=0; $j < 5; $j++) { ?>
                  <div class="font-weight-bold card-header py-0 text-danger border-bottom border-top border-primary" id="label-hari">
                    <?= $data['rekapitem'][$j]; ?>
                  </div>
                  <div class="py-1 border-bottom border-primary">
                    <?php if (count($data['shortbydate'][$i][$j]) == 0) { ?>
                      <p class="card-text mx-2">Kosong / Tidak ada Transaksi</p>
                    <?php } else { ?>

                      <?php foreach ($data['shortbydate'][$i][$j] as $value) { ?>

                        <?php if ($j == 0) { ?>
                          <div class="d-flex justify-content-between align-items-center cover-detail-transaksi mx-2 mb-1 mb-1">
                            <p class="card-text my-0 pl-2"><?= $value['merk'].' '.$value['tipe'].' ('.$value['imei'].')'; ?></p>
                            <div class="py-1 my-0 pr-3">
                              <button type="button" class="btn btn-sm btn-primary py-0">detail</button>
                            </div>
                          </div>
                        <?php } else if ($j == 1) {?>
                          <div class="d-flex justify-content-between align-items-center cover-detail-transaksi mx-2 mb-1">
                            <p class="card-text my-0 pl-2"><?= $value['merk'].' '.$value['tipe'].' ('.$value['imei'].')'; ?></p>
                            <div class="py-1 my-0 pr-3">
                              <button type="button" class="btn btn-sm btn-primary py-0">detail</button>
                            </div>
                          </div>
                        <?php } else if ($j == 2) {?>
                          <div class="d-flex justify-content-between align-items-center cover-detail-transaksi mx-2 mb-1">
                            <p class="card-text my-0 pl-2"><?= $value['merk'].' '.$value['tipe'].' '.$value['kerusakan']; ?></p>
                            <div class="py-1 my-0 pr-3">
                              <button type="button" class="btn btn-sm btn-primary py-0">detail</button>
                            </div>
                          </div>
                        <?php } else if ($j == 3) {?>
                          <div class="d-flex justify-content-between align-items-center cover-detail-transaksi mx-2 mb-1">
                            <p class="card-text my-0 pl-2"><?= $value['merk'].' '.$value['tipe'].' '.$value['kerusakan']; ?></p>
                            <div class="py-1 my-0 pr-3">
                              <button type="button" class="btn btn-sm btn-primary py-0">detail</button>
                            </div>
                          </div>
                        <?php } else if ($j == 4) {?>
                          <div class="d-flex justify-content-between align-items-center cover-detail-transaksi mx-2 mb-1">
                            <p class="card-text my-0 pl-2"><?= $value['nama']; ?></p>
                            <div class="py-1 my-0 pr-3">
                              <button type="button" class="btn btn-sm btn-primary py-0">detail</button>
                            </div>
                          </div>
                        <?php } ?>

                      <?php } ?>

                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
            </div>

          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</div>


<div id="bottomfooter">
  <div class="border border-success bg-white text-center">
    <h1>NOERICELL DANDANGAN</h1>
  </div>
</div>
