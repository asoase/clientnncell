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

    <div class="col-lg-4 col-12 mx-2 my-2">
      <div class="cover-terluar">
        <div class="judul-list1 font-weight-bold">
          Bonus
        </div>
        <div class="accordion" id="accordion-bonus">
          <?php for ($i=0; $i < 2; $i++) { ?>
            <?php $sales = $data['sales'][$i]; ?>
            <div class="judul-list1">
              <a class="bt-accordion" data-toggle="collapse" href="#accordionbonus<?=$i;?>">
                <?= $data['sales'][$i]; ?><i class="fas fa-lg fa-angle-down"></i>
              </a>
              <div class="collapse" id="accordionbonus<?=$i;?>" data-parent="#accordion-bonus">
                <div class="tabel-hari mt-4">
                  <div class="judul-list1">
                    <div>
                      <p>
                        HP MASUK : <?= $data[$sales]['bhpin']['bhpintotal'].' (return '.$data[$sales]['bhpin']['bhpinreturn'].')'; ?>
                      </p>
                      <p>
                        HP TERJUAL : <?= $data[$sales]['bhpout']['bhpouttotal'].' (return '.$data[$sales]['bhpout']['bhpoutreturn'].')'; ?>
                      </p>
                      <p>
                        SERVIS : <?= $data[$sales]['bservis']['bservistotal'].' (return '.$data[$sales]['bservis']['bservisreturn'].')'; ?>
                      </p>
                    </div>
                  </div>
                  <div class="judul-list1">
                    <a class="bt-accordion text-primary" data-toggle="collapse" href="#detailbonus<?=$i;?>">
                      detail<i class="fas fa-lg fa-angle-down"></i>
                    </a>
                    <div class="collapse" id="detailbonus<?=$i;?>">
                      <div class="tabel-hari mt-4">
                        <div class="judul-list1 font-weight-bold">
                          HP MASUK
                        </div>
                        <?php if ($data[$sales]['bhpin']['bhpintotal'] > 0) {?>
                          <?php $index = 1; ?>
                          <table class="table table-bordered">
                            <?php foreach ($data[$sales]['bhpin']['ballin']['return'] as $item) {?>
                              <tr class="text-danger">
                                <td class="align-middle"><?= $index; ?></td>
                                <td align="left"><?= $item; ?></td>
                              </tr>
                              <?php $index++; ?>
                            <?php } ?>
                            <?php foreach ($data[$sales]['bhpin']['ballin']['bonus'] as $item) {?>
                              <tr class="text-primary">
                                <td class="align-middle"><?= $index; ?></td>
                                <td align="left"><?= $item;  ?></td>
                              </tr>
                              <?php $index++; ?>
                            <?php } ?>
                          </table>
                        <?php } else{ ?>
                          <div class="judul-list1 text-danger">
                            tidak ada bonus
                          </div>
                        <?php } ?>
                        <div class="judul-list1 font-weight-bold">
                          HP TERJUAL
                        </div>
                        <?php if ($data[$sales]['bhpout']['bhpouttotal'] > 0) {?>
                          <?php $index = 1; ?>
                          <table class="table table-bordered">
                            <?php foreach ($data[$sales]['bhpout']['ballout']['return'] as $item) {?>
                              <tr class="text-danger">
                                <td class="align-middle"><?= $index; ?></td>
                                <td align="left"><?= $item; ?></td>
                              </tr>
                              <?php $index++; ?>
                            <?php } ?>
                            <?php foreach ($data[$sales]['bhpout']['ballout']['bonus'] as $item) {?>
                              <tr class="text-primary">
                                <td class="align-middle"><?= $index; ?></td>
                                <td align="left"><?= $item;  ?></td>
                              </tr>
                              <?php $index++; ?>
                            <?php } ?>
                          </table>
                        <?php } else{ ?>
                          <div class="judul-list1 text-danger">
                            tidak ada bonus
                          </div>
                        <?php } ?>
                        <div class="judul-list1 font-weight-bold">
                          SERVIS
                        </div>
                        <?php if ($data[$sales]['bservis']['bservistotal'] > 0) {?>
                          <?php $index = 1; ?>
                          <table class="table table-bordered">
                            <?php foreach ($data[$sales]['bservis']['ballserv']['return'] as $item) {?>
                              <tr class="text-danger">
                                <td class="align-middle"><?= $index; ?></td>
                                <td align="left"><?= $item; ?></td>
                              </tr>
                              <?php $index++; ?>
                            <?php } ?>
                            <?php foreach ($data[$sales]['bservis']['ballserv']['bonus'] as $item) {?>
                              <tr class="text-primary">
                                <td class="align-middle"><?= $index; ?></td>
                                <td align="left"><?= $item;  ?></td>
                              </tr>
                              <?php $index++; ?>
                            <?php } ?>
                          </table>
                        <?php } else{ ?>
                          <div class="judul-list1 text-danger">
                            tidak ada bonus
                          </div>
                        <?php } ?>
                        <div class="py-1">
                          <p></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="py-1">
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="judul-list1">
          <a class="bt-accordion font-weight-bold" data-toggle="collapse" href="#collapsetotal">
            Total Transaksi<i class="fas fa-lg fa-angle-down"></i>
          </a>
          <div class="collapse" id="collapsetotal">
            <div class="tabel-hari mt-2">
              <div class="judul-list1">
                <div>
                  <?php if ($data['totaltransaksi']['hpin'][1] > 0) {?>
                    HP MASUK : <?= $data['totaltransaksi']['hpin'][0].' (return '.$data['totaltransaksi']['hpin'][1].')'; ?> 
                  <?php } else{ ?>
                    HP MASUK : <?= $data['totaltransaksi']['hpin'][0]; ?> 
                  <?php } ?>
                </div>
                <div>
                  <?php if ($data['totaltransaksi']['hpout'][1] > 0) {?>
                    HP TERJUAL : <?= $data['totaltransaksi']['hpout'][0].' (return '.$data['totaltransaksi']['hpout'][1].')'; ?> 
                  <?php } else{ ?>
                    HP TERJUAL : <?= $data['totaltransaksi']['hpout'][0]; ?> 
                  <?php } ?>
                </div>
                <div>
                  <?php if ($data['totaltransaksi']['servis'][1] > 0) {?>
                    SERVIS : <?= $data['totaltransaksi']['servis'][0].' (return '.$data['totaltransaksi']['servis'][1].')'; ?> 
                  <?php } else{ ?>
                    SERVIS : <?= $data['totaltransaksi']['servis'][0]; ?> 
                  <?php } ?>
                </div>
              </div>
              <div class="py-1">
                <p></p>
              </div>
            </div>
          </div>
        </div>
        <div class="py-1">
          <p></p>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-12 mx-2 my-2">
      <div class="cover-terluar">
        <div class="judul-list1 font-weight-bold">
          Detail Transaksi
          <div class="my-0 font-weight-light">
            <div class="container-fluid">
              <div class="row justify-content-end">
                <div class="col-xs-12 mx-2">
                  Minggu <?=$data['allday'][0];?>
                </div>
                <div class="col-xs-12 mx-2">
                  Sabtu <?=$data['allday'][6];?>
                </div>
              </div>
            </div>
          </div>
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
                      <?= $data['rekapitem'][$j]; ?>
                    </div>
                    <?php if ($jumlahbarang == 0) {?>
                      <div class="judul-list1">
                        <div class="d-flex align-item-center justify-content-between text-danger">Tidak Ada Transaksi</div>
                      </div>
                    <?php } else {?>
                      <table class="table table-bordered">
                        <?php $index = 1; ?>
                        <?php foreach ($data['shortbydate'][$i][$j] as $value) {?>
                          <?php if ($j == 0) {?>
                            <tr class="text-primary">
                              <td class="align-middle"><?= $index; ?></td>
                              <td align="left">
                                <button class="bt-detail-hari" data-transaksi="<?= $j; ?>" data-iditem="<?= $value['id']; ?>" data-toggle="modal" data-target="#detailModal">
                                  <div class="d-flex align-item-center justify-content-between">
                                    <?= $value['merk'].' '.$value['tipe'].' ('.$value['imei'].')'; ?>
                                    <i class="fas fa-lg fa-ellipsis-v"></i>
                                  </div>
                                </button>
                              </td>
                            </tr>
                            <?php $index++; ?>
                          <?php } else if ($j == 1) {?>
                            <tr class="text-primary">
                              <td class="align-middle"><?= $index; ?></td>
                              <td align="left">
                                <button class="bt-detail-hari" data-transaksi="<?= $j; ?>" data-iditem="<?= $value['id']; ?>" data-toggle="modal" data-target="#detailModal">
                                  <div class="d-flex align-item-center justify-content-between">
                                    <?= $value['merk'].' '.$value['tipe'].' ('.$value['imei'].')'; ?>
                                    <i class="fas fa-lg fa-ellipsis-v"></i>
                                  </div>
                                </button>
                              </td>
                            </tr>
                            <?php $index++; ?>
                          <?php } else if ($j == 2) {?>
                            <tr class="text-primary">
                              <td class="align-middle"><?= $index; ?></td>
                              <td align="left">
                                <button class="bt-detail-hari" data-transaksi="<?= $j; ?>" data-iditem="<?= $value['id']; ?>" data-toggle="modal" data-target="#detailModal">
                                  <div class="d-flex align-item-center justify-content-between">
                                    <?= $value['merk'].' '.$value['tipe']; ?>
                                    <i class="fas fa-lg fa-ellipsis-v"></i>
                                  </div>
                                </button>
                              </td>
                            </tr>
                            <?php $index++; ?>
                          <?php } else if ($j == 3) {?>
                            <tr class="text-primary">
                              <td class="align-middle"><?= $index; ?></td>
                              <td align="left">
                                <button class="bt-detail-hari" data-transaksi="<?= $j; ?>" data-iditem="<?= $value['id']; ?>" data-toggle="modal" data-target="#detailModal">
                                  <div class="d-flex align-item-center justify-content-between">
                                    <?= $value['merk'].' '.$value['tipe']; ?>
                                    <i class="fas fa-lg fa-ellipsis-v"></i>
                                  </div>
                                </button>
                              </td>
                            </tr>
                            <?php $index++; ?>
                          <?php } else if ($j == 4) {?>
                            <tr class="text-primary">
                              <td class="align-middle"><?= $index; ?></td>
                              <td align="left">
                                <button class="bt-detail-hari" data-transaksi="<?= $j; ?>" data-iditem="<?= $value['id']; ?>" data-toggle="modal" data-target="#detailModal">
                                  <div class="d-flex align-item-center justify-content-between">
                                    <?= $value['nama']; ?>
                                    <i class="fas fa-lg fa-ellipsis-v"></i>
                                  </div>
                                </button>
                              </td>
                            </tr>
                            <?php $index++; ?>
                          <?php } ?>
                        <?php } ?>
                      </table>
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

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content isidetail" id="isidetail">
    </div>
  </div>
</div>