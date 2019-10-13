<div class="container" ng-app="mainapp" ng-controller="cmain">

  <div class="row">
    <div class="col">
      <div class="dropdown">
        <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">Tambah Data</button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal" onclick="loopvalidation(true)">Hp Masuk</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal" onclick="loopvalidation(true)">Hp Terjual</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal" onclick="loopvalidation(true)">Servis Selesai</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal" onclick="loopvalidation(true)">Servis Return</button>
          <button type="button" class="btn btn-primary btn-xs btdropdown" data-toggle="modal" data-target="#inputmodal" onclick="loopvalidation(true)">Accesoris</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="input-group date datepicker" data-provide="datepicker">
      <input type="text" class="form-control datepicker0110">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <!-- Modal -->
      <div class="modal fade" id="inputmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="loopvalidation(false)">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal" onclick="loopvalidation(false)">Keluar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <div ng-show="ontable.isshow(0)" class="col-12">
      <div class="text-center">HP MASUK</div>
      <table class="table table-sm table-bordered table-striped table-bordered table-responsive-sm table-hover">
        <thead class="table-primary">
          <tr>
            <th scope="col">merk</th>
            <th scope="col">tipe</th>
            <th scope="col">imei</th>
            <th scope="col">garansi</th>
            <th scope="col">ram</th>
            <th scope="col">rom</th>
            <th scope="col">harga</th>
            <th scope="col">kelengkapan</th>
            <th scope="col">kerusakan</th>
            <th scope="col">sales</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="hin in shpins.sout">
            <td>{{hin.merk}}</td>
            <td>{{hin.tipe}}</td>
            <td>{{hin.imei}}</td>
            <td>{{hin.garansi}}</td>
            <td>{{hin.ram}}</td>
            <td>{{hin.rom}}</td>
            <td>{{hin.harga}}</td>
            <td>{{hin.kelengkapan}}</td>
            <td>{{hin.kerusakan}}</td>
            <td>{{hin.sales}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div ng-show="ontable.isshow(1)" class="col-12">
      <div class="text-center">HP KELUAR</div>
      <table class="table table-sm table-bordered table-striped table-bordered table-responsive-sm table-hover">
        <thead class="table-primary">
          <tr>
            <th scope="col">merk</th>
            <th scope="col">tipe</th>
            <th scope="col">imei</th>
            <th scope="col">garansi</th>
            <th scope="col">ram</th>
            <th scope="col">rom</th>
            <th scope="col">harga awal</th>
            <th scope="col">terjual</th>
            <th scope="col">kelengkapan</th>
            <th scope="col">kerusakan</th>
            <th scope="col">sales</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="hout in shpouts.sout">
            <td>{{hout.merk}}</td>
            <td>{{hout.tipe}}</td>
            <td>{{hout.imei}}</td>
            <td>{{hout.garansi}}</td>
            <td>{{hout.ram}}</td>
            <td>{{hout.rom}}</td>
            <td>{{hout.harga_awal}}</td>
            <td>{{hout.terjual}}</td>
            <td>{{hout.kelengkapan}}</td>
            <td>{{hout.kerusakan}}</td>
            <td>{{hout.sales}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div ng-show="ontable.isshow(2)" class="col-12">
      <div class="text-center">SERVIS SELESAI</div>
      <table class="table table-sm table-bordered table-striped table-bordered table-responsive-sm table-hover">
        <thead class="table-primary">
          <tr>
            <th scope="col">merk</th>
            <th scope="col">tipe</th>
            <th scope="col">imei</th>
            <th scope="col">kerusakan</th>
            <th scope="col">biaya</th>
            <th scope="col">teknisi</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="sdone in sservdon.sout">
            <td>{{sdone.merk}}</td>
            <td>{{sdone.tipe}}</td>
            <td>{{sdone.imei}}</td>
            <td>{{sdone.kerusakan}}</td>
            <td>{{sdone.biaya}}</td>
            <td>{{sdone.teknisi}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div ng-show="ontable.isshow(3)" class="col-12">
      <div class="text-center">SERVIS RETURN</div>
      <table class="table table-sm table-bordered table-striped table-bordered table-responsive-sm table-hover">
        <thead class="table-primary">
          <tr>
            <th scope="col">merk</th>
            <th scope="col">tipe</th>
            <th scope="col">imei</th>
            <th scope="col">kerusakan</th>
            <th scope="col">biaya</th>
            <th scope="col">teknisi</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="sret in sservrets.sout">
            <td>{{sret.merk}}</td>
            <td>{{sret.tipe}}</td>
            <td>{{sret.imei}}</td>
            <td>{{sret.kerusakan}}</td>
            <td>{{sret.biaya}}</td>
            <td>{{sret.teknisi}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div ng-show="ontable.isshow(4)" class="col-12">
      <div class="text-center">ACCESORIS</div>
      <table class="table table-sm table-bordered table-striped table-bordered table-responsive-sm table-hover">
        <thead class="table-primary">
          <tr>
            <th scope="col">nama</th>
            <th scope="col">harga</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="acc in sacc.sout">
            <td>{{acc.nama}}</td>
            <td>{{acc.harga}}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

  <form ng-show="readypost()" method="POST" action="<?php echo(base_url()); ?>admin/aftersubmit/rekapdata1hari" id="submitdata0110">
    <input type="text" class="form-control form-control-sm hiddeninput0110" name="tanggal" placeholder="col-form-label-sm" hidden>
    <input type="text" class="form-control form-control-sm hiddeninput0110" name="username" placeholder="col-form-label-sm" hidden>
    <input type="text" class="form-control form-control-sm hiddeninput0110" name="datainput" placeholder="col-form-label-sm" hidden>
    <button class="btn btn-primary btn-xs" type="submit">Tambahkan Data</button>
  </form>

</div>

<script>
  function loopvalidation(cond){
    cond ? (isloop = setInterval(doclick, 1000)) : clearInterval(isloop);
  }

  function doclick(){
    console.log('looop');
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
}
</script>