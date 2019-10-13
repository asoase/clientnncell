<div class="container-fluid" ng-app="mainapp" ng-controller="cmain">

  <!-- dropdown -->
  <div class="row">
    <div class="col">
      <div class="dropdown">
        <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">Tambah Data</button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal">Hp Masuk</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal">Hp Terjual</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal">Servis Selesai</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal">Servis Return</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal">Accesoris</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end dropdown -->

  <!-- datepicker -->
  <div class="row">
    <div class="input-group date datepicker col-md-4" data-provide="datepicker">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Tanggal</span>
      </div>
      <input type="text" class="form-control datepicker0110" placeholder="Masukkan Tanggal">
      <div class="input-group-addon">
        <i class="glyphicon glyphicon-th"></i>
      </div>
    </div>
  </div>
  <!-- end datepicker -->

  <!-- input modal -->
  <div class="row">
    <div class="col-12">
      <!-- Modal -->
      <div class="modal fade" id="inputmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Keluar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end input modal -->

  <!-- hp masuk -->
  <div class="row" ng-show="ontable.isshow(0)">
    <div class="col-12 mb-2 mt-2 badge badge-primary">
      <h5 class="text-center">HP MASUK</h5>
    </div>
    <div class="card col-md-4" ng-repeat="hin in shpins.sout">
      <div class="card-body">
        <h5 class="card-title">Hp Masuk</h5>
        <p class="card-text mb-0 pb-0">merk, tipe/imei : {{hin.merk}}, {{hin.tipe}}/{{hin.imei}}</p>
        <p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : {{hin.ram}}/{{hin.rom}}/{{hin.jaringan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">garansi : {{hin.garansi}}</p>
        <p class="card-text mb-0 pb-0 mt-0">harga : {{hin.harga}}</p>
        <p class="card-text mb-0 pb-0 mt-0">kelengkapan : {{hin.kelengkapan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">kerusakan : {{hin.kerusakan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">sales : {{hin.sales}}</p>
        <p class="card-text mb-0 pb-0 mt-0">catatan : {{hin.catatan}}</p>
        <a href="" ng-click="editorremoveitem('chin',$index, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
        <a href="" ng-click="editorremoveitem('chin',$index)" class="badge badge-danger">hapus</a>
      </div>
    </div>
  </div>
  <!-- end tabel hp masuk -->

  <!-- hp keluar -->
  <div class="row" ng-show="ontable.isshow(1)">
    <div class="col-12 mb-2 mt-2 badge badge-primary">
      <h5 class="text-center">HP TERJUAL</h5>
    </div>
    <div class="card col-md-4" ng-repeat="hout in shpouts.sout">
      <div class="card-body">
        <h5 class="card-title">Hp Terjual</h5>
        <p class="card-text mb-0 pb-0">merk, tipe/imei : {{hout.merk}}, {{hout.tipe}}/{{hout.imei}}</p>
        <p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : {{hout.ram}}/{{hout.rom}}/{{hout.jaringan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">garansi : {{hout.garansi}}</p>
        <p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : {{hout.harga_awal}}/{{hout.terjual}}</p>
        <p class="card-text mb-0 pb-0 mt-0">kelengkapan : {{hout.kelengkapan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">kerusakan : {{hout.kerusakan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">sales : {{hout.sales}}</p>
        <p class="card-text mb-0 pb-0 mt-0">catatan : {{hout.catatan}}</p>
        <a href="" ng-click="editorremoveitem('chout',$index, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
        <a href="" ng-click="editorremoveitem('chout',$index)" class="badge badge-danger">hapus</a>
      </div>
    </div>
  </div>
  <!-- end hp keluar -->

  <!-- servis selesai -->
  <div class="row" ng-show="ontable.isshow(2)">
    <div class="col-12 mb-2 mt-2 badge badge-primary">
      <h5 class="text-center">SERVIS SELESAI</h5>
    </div>
    <div class="card col-md-4" ng-repeat="sdone in sservdon.sout">
      <div class="card-body">
        <h5 class="card-title">Servis Selesai</h5>
        <p class="card-text mb-0 pb-0">merk, tipe/imei : {{sdone.merk}}, {{sdone.tipe}}/{{sdone.imei}}</p>
        <p class="card-text mb-0 pb-0 mt-0">kerusakan : {{sdone.kerusakan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">biaya : {{sdone.biaya}}</p>
        <p class="card-text mb-0 pb-0 mt-0">teknisi : {{sdone.teknisi}}</p>
        <p class="card-text mb-0 pb-0 mt-0">catatan : {{sdone.catatan}}</p>
        <a href="" ng-click="editorremoveitem('csdone',$index, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
        <a href="" ng-click="editorremoveitem('csdone',$index)" class="badge badge-danger">hapus</a>
      </div>
    </div>
  </div>
  <!-- end tabel servis selesai -->

  <!-- servis return -->
  <div class="row" ng-show="ontable.isshow(3)">
    <div class="col-12 mb-2 mt-2 badge badge-primary">
      <h5 class="text-center">SERVIS RETURN</h5>
    </div>
    <div class="card col-md-4" ng-repeat="sret in sservrets.sout">
      <div class="card-body">
        <h5 class="card-title">Servis Return</h5>
        <p class="card-text mb-0 pb-0">merk, tipe/imei : {{sret.merk}}, {{sret.tipe}}/{{sret.imei}}</p>
        <p class="card-text mb-0 pb-0 mt-0">kerusakan : {{sret.kerusakan}}</p>
        <p class="card-text mb-0 pb-0 mt-0">biaya : {{sret.biaya}}</p>
        <p class="card-text mb-0 pb-0 mt-0">teknisi : {{sret.teknisi}}</p>
        <p class="card-text mb-0 pb-0 mt-0">catatan : {{sret.catatan}}</p>
        <a href="" ng-click="editorremoveitem('csret',$index, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
        <a href="" ng-click="editorremoveitem('csret',$index)" class="badge badge-danger">hapus</a>
      </div>
    </div>
  </div>
  <!-- end servis return -->

  <!-- accesoris -->
  <div class="row" ng-show="ontable.isshow(4)">
    <div class="col-12 mb-2 mt-2 badge badge-primary">
      <h5 class="text-center">ACCESORIS</h5>
    </div>
    <!-- ng-repeat="acc in sacc.sout" -->

    <div class="card col-md-4" ng-repeat="acc in sacc.sout">
      <div class="card-body">
        <h5 class="card-title">Accesoris</h5>
        <p class="card-text mb-0 pb-0">nama barang : {{acc.nama}}</p>
        <p class="card-text mb-0 pb-0 mt-0">harga : {{acc.harga}}</p>
        <p class="card-text mb-0 pb-0 mt-0">catatan : {{acc.catatan}}</p>
        <a href="" ng-click="editorremoveitem('cacc',$index, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
        <a href="" ng-click="editorremoveitem('cacc',$index)" class="badge badge-danger">hapus</a>
      </div>
    </div>

  </div>
  <!-- end accesoris -->

  <div class="row mt-4" ng-show="readypost()">
    <!-- hidden form untuk submit -->
    <div class="col text-center">
      <form method="POST" action="<?= base_url('rekap/rekap'); ?>" id="submitdata0110">
        <input type="text" class="form-control form-control-sm hiddeninput0110" name="tanggal" placeholder="col-form-label-sm" hidden>
        <input type="text" class="form-control form-control-sm hiddeninput0110" name="username" placeholder="col-form-label-sm" hidden>
        <input type="text" class="form-control form-control-sm hiddeninput0110" name="datainput" placeholder="col-form-label-sm" hidden>
        <button class="btn btn-primary btn-xs" type="submit">Submit Data</button>
      </form>
    </div>
    <!-- end hidden form untuk submit -->
  </div>

</div>