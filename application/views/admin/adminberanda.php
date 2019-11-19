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
  <form class="form-inline" action="<?=base_url('admin/cari');?>">
    <div class="input-group">
      <input type="text" class="bl20" placeholder="Cari barang" id="mainsearchinput" name="cari" required="true">
      <div class="input-group-append">
        <button class="btn btn-primary br20" type="submit" id="mainsubmit"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>
</nav>

<div class="container mt-3">
  <div class="row justify-content-end">
  </div>
</div>

<!-- detail transaksi -->
<div class="container-fluid mt-4">
  <div class="row no-gutters justify-content-center">

    <div class="col-lg-3 col-md-5 col-sm-8 mx-2 my-2">
      <div class="cover-terluar">
        <!-- cover-tanggal -->
        <div class="judul-list1 font-weight-bold">
          Menuju ke-Tanggal
        </div>
        <div class="d-flex justify-content-start pl-2">
          <div>
            <div class="mt-3">
              Masukkan Tanggal
            </div>
            <div class="mt-3">
              <form action="" method="GET">
                <div class="input-group">
                  <!-- <label for="mainsearchinput" class="mr-2 col-form-label">Masukkan Tanggal</label> -->
                  <input type="date" class="bl20" placeholder="Masukkan tanggal" id="mainsearchinput" name="ketanggal" required="true">
                  <div class="input-group-append">
                    <button class="btn btn-primary br20" type="submit" id="mainsubmit"><i class="fas fa-lg fa-chevron-circle-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <div class="py-1 mt-3 d-flex justify-content-end">
              <ul class="pagination" id="seminggu">
                <li class="page-item"><a class="page-link bg-primary text-white bl20" href="<?= $data['page'][0]; ?>"><i class="fas fa-angle-double-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="<?= $data['page'][2]; ?>">Minggu Ini</a></li>
                <li class="page-item"><a class="page-link bg-primary text-white br20" href="<?= $data['page'][1]; ?>"><i class="fas fa-angle-double-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="clearfix"></div> -->
    <div class="col-lg-4 col-12 my-2 ">
      <!-- cover-detail-transaksi -->
      <!-- judul Utama -->
      <div class="cover-terluar">
        <div class="judul-list1 font-weight-bold">
          Detail Transaksi
          <p class="my-0 font-weight-light d-flex align-item-center justify-content-end">Minggu <?=$data['allday'][0];?> - Sabtu <?=$data['allday'][6];?></p>
        </div>
        <!-- menampilkan hari menggunakan accordion -->
        <div class="accordion" id="accordion-hari">
          <?php for ($i = 0; $i < 7; $i++) {?>
            <div class="judul-list1">
              <a class="bt-accordion" data-toggle="collapse" href="#accordionhari<?=$i;?>">
                <?=$data['dayname'][$i] . ' ' . $data['allday'][$i];?><i class="fas fa-lg fa-angle-down"></i>
              </a>
              <div class="collapse" id="accordionhari<?=$i;?>" data-parent="#accordion-hari">
                <div class="tabel-hari mt-4">
                  <?php for ($j = 0; $j < 5; $j++) {?>
                    <?php $jumlahbarang = count($data['shortbydate'][$i][$j]); ?>
                    <div class="judul-list1 font-weight-bold">
                      <?php if ($jumlahbarang == 0) { ?>
                        <?=$data['rekapitem'][$j].' ';?><span class="px-2 rounded-circle bg-danger text-white"><?= $jumlahbarang; ?></span>
                      <?php } else { ?>
                        <?=$data['rekapitem'][$j].' ';?><span class="px-2 rounded-circle bg-primary text-white"><?= $jumlahbarang; ?></span>
                      <?php } ?>
                    </div>
                    <?php if ($jumlahbarang == 0) {?>
                      <div class="judul-list1">
                        <div class="d-flex align-item-center justify-content-between text-danger">Tidak Ada Transaksi</div>
                      </div>
                    <?php } else {?>
                      <?php foreach ($data['shortbydate'][$i][$j] as $value) {?>
                        <?php if ($j == 0) {?>
                          <div class="judul-list1">
                            <button class="bt-detail-hari">
                              <div class="d-flex align-item-center justify-content-between">
                                <div style="overflow-x: auto;">
                                  <?= $value['merk'].' '.$value['tipe'].' ('.$value['imei'].')'; ?>
                                </div>
                                <i class="fas fa-lg fa-info-circle"></i>
                              </div>
                            </button>
                          </div>
                        <?php } else if ($j == 1) {?>
                          <div class="judul-list1">
                            <button class="bt-detail-hari">
                              <div class="d-flex align-item-center justify-content-between">
                                <div style="overflow-x: auto;">
                                  <?= $value['merk'].' '.$value['tipe'].' ('.$value['imei'].')'; ?>
                                </div>
                                <i class="fas fa-lg fa-info-circle"></i>
                              </div>
                            </button>
                          </div>
                        <?php } else if ($j == 2) {?>
                          <div class="judul-list1">
                            <button class="bt-detail-hari">
                              <div class="">
                                <div class="float-left">
                                  <?= $value['merk'].' '.$value['tipe'].' '.$value['kerusakan']; ?>
                                </div>
                                <i class="fas fa-lg fa-info-circle float-right"></i>
                              </div>
                            </button>
                          </div>
                        <?php } else if ($j == 3) {?>
                          <div class="judul-list1">
                            <button class="bt-detail-hari">
                              <div class="d-flex align-item-center justify-content-between">
                                <div style="overflow-x: auto;">
                                  <?= $value['merk'].' '.$value['tipe'].' '.$value['kerusakan']; ?>
                                </div>
                                <i class="fas fa-lg fa-info-circle"></i>
                              </div>
                            </button>
                          </div>
                        <?php } else if ($j == 4) {?>
                          <div class="judul-list1">
                            <button class="bt-detail-hari">
                              <div class="d-flex align-item-center justify-content-between">
                                <div style="overflow-x: auto;">
                                  <?= $value['nama']; ?>
                                </div>
                                <i class="fas fa-lg fa-info-circle"></i>
                              </div>
                            </button>
                          </div>
                        <?php } ?>
                      <?php }?>
                    <?php }?>
                  <?php }?>
                  <div class="py-0 my-0">
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
        </div>

        <div class="py-1">
          <p></p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-12 mx-2 my-2">
      <!-- cover-bonus -->
      <div class="cover-terluar">
        <div class="judul-list1 font-weight-bold">
          Bonus
        </div>
        <div class="judul-list1 font-weight-bold">
          Total Transaksi
        </div>
        <div class="py-1">
          <p></p>
        </div>
      </div>
    </div>

  </div>
</div>