function gettransaksitype(tipeitem) {
  switch (tipeitem) {
    case 'hp_in':
      return 0;
    case 'hp_out':
      return 1;
    case 'servis_out':
      return 2;
    case 'servis_return':
      return 3;
    case 'accesoris':
      return 4;
  }
}

// button detail hari ketika di click mengisi modal dengan table berisi detail item yang di click
$('button.detail-item').on('click', function(event) {
  let transaksi = $(this).data('tipeitem');
  transaksi = gettransaksitype(transaksi);
  let id = $(this).data('iditem');
  let urlajaxparams = base_url + 'admin/isidetail/' + transaksi + '/' + id;
  let ajaxparams = {
    urlajax: urlajaxparams,
    username: 'isidetail9009',
    actiononcomplete: 'initbuttonedithapus'
  };
  ajaxfunction(ajaxparams);
});

function ajaxfunction(ajaxparams) {
  $.ajax({
    url: ajaxparams.urlajax,
    timeout: 2000,
    cache: false,
    data: {
      username: ajaxparams.username,
      dataput: ajaxparams.dataput
    },
    type: 'POST',
    beforeSend: function() {
      modalloading();
    },
    success: function(data) {
      if (ajaxparams.username == 'deleteitem9009') {
        let result = JSON.parse(data);
        if (result.status) {
          isimodal(result.message);
        } else {
          isimodal(result.message);
        }
      } else {
        isimodal(data);
      }
    },
    error: function(data) {
      isimodal('-- koneksi error --');
    },
    complete: function() {
      oncomplete(ajaxparams.actiononcomplete);
    }
  });
}

function modalloading() {
  htmlloading = `
  <div class="text-center">
  <div class="spinner-border text-info" role="status">
  <span class="sr-only">Loading...</span>
  </div>
  </div>
  `;
  $('div.isimodal').html(htmlloading);
}

function isimodal(data) {
  $('div.isimodal').html(data);
}

function oncomplete(actiononcomplete) {
  switch (actiononcomplete) {
    case 'initbuttonedithapus':
      initbuttonedithapus();
      break;
    case 'initbuttonsubmitedit':
      initbuttonsubmitedit();
      break;
    case 'initbuttondelete':
      initbuttondelete();
      break;
    default:
      break;
  }
}

function initbuttonedithapus() {
  $('.isimodal .modal-footer .edititem').click(function() {
    let transaksi = $(this).data('tipetransaksi');
    let id = $(this).data('iditem');
    let urlajaxparams = base_url + 'admin/editdetail/' + transaksi + '/' + id;
    let ajaxparams = {
      urlajax: urlajaxparams,
      username: 'editdetail9009',
      actiononcomplete: 'initbuttonsubmitedit'
    };
    ajaxfunction(ajaxparams);
  });
  $('.isimodal .modal-footer .hapusitem').click(function() {
    let transaksi = $(this).data('tipetransaksi');
    let id = $(this).data('iditem');
    let urlajaxparams = base_url + 'admin/dialogdeleteitem/' + transaksi + '/' + id;
    let ajaxparams = {
      urlajax: urlajaxparams,
      username: 'dialogdelete9009',
      actiononcomplete: 'initbuttondelete'
    };
    ajaxfunction(ajaxparams);
  });
}
// untuk mendapatkan nilai
function initbuttonsubmitedit() {
  bootstrapformvalidation();
  $('input.inputcurrency').autoNumeric('init');
}

function bootstrapformvalidation() {
  (function() {
    'use strict';
    window.addEventListener('load', function() {
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
    }, false);
  })();
}
// submitedit dipanggil otomatis saat form disubmit yang ada didalam modal setelah validasi terpenuhi
function submitedit(tipetransaksi, iditem) {
  var dataput = {};
  let isiform = $('.isimodal form.formedit').find('.inputform');
  let urutanisiform;
  switch (tipetransaksi) {
    case 0:
      urutanisiform = ['merk', 'tipe', 'imei', 'tanggal', 'ram', 'rom', 'jaringan', 'garansi', 'harga', 'kelengkapan', 'kerusakan', 'sales', 'catatan'];
      for (let i = 0; i < isiform.length; i++) {
        if (i != 8) dataput[urutanisiform[i]] = isiform.eq(i).val();
        else dataput[urutanisiform[i]] = isiform.eq(i).autoNumeric('get');
      }
      break;
    case 1:
      urutanisiform = ['merk', 'tipe', 'imei', 'tanggal', 'ram', 'rom', 'jaringan', 'garansi', 'harga_awal', 'terjual', 'kelengkapan', 'kerusakan', 'sales', 'catatan'];
      for (let i = 0; i < isiform.length; i++) {
        if ((i == 8) || (i == 9)) dataput[urutanisiform[i]] = isiform.eq(i).autoNumeric('get');
        else dataput[urutanisiform[i]] = isiform.eq(i).val();
      }
      break;
    case 2:
      urutanisiform = ['merk', 'tipe', 'imei', 'tanggal', 'kerusakan', 'biaya', 'teknisi', 'catatan'];
      for (let i = 0; i < isiform.length; i++) {
        if (i != 5) dataput[urutanisiform[i]] = isiform.eq(i).val();
        else dataput[urutanisiform[i]] = isiform.eq(i).autoNumeric('get');
      }
      break;
    case 3:
      urutanisiform = ['merk', 'tipe', 'imei', 'tanggal', 'kerusakan', 'biaya', 'teknisi', 'catatan'];
      for (let i = 0; i < isiform.length; i++) {
        if (i != 5) dataput[urutanisiform[i]] = isiform.eq(i).val();
        else dataput[urutanisiform[i]] = isiform.eq(i).autoNumeric('get');
      }
      break;
    case 4:
      urutanisiform = ['nama', 'tanggal', 'harga', 'catatan'];
      for (let i = 0; i < isiform.length; i++) {
        if (i != 2) dataput[urutanisiform[i]] = isiform.eq(i).val();
        else dataput[urutanisiform[i]] = isiform.eq(i).autoNumeric('get');
      }
      break;
    default:
      break;
  }
  dataputparams = JSON.stringify(dataput);
  let urlajaxparams = base_url + 'admin/submitedit/' + tipetransaksi + '/' + iditem;
  let ajaxparams = {
    urlajax: urlajaxparams,
    username: 'submitedit9009',
    actiononcomplete: '',
    dataput: dataputparams
  };
  ajaxfunction(ajaxparams);
}

function initbuttondelete() {
  $('.isimodal .modal-footer .submithapus').click(function() {
    let transaksi = $(this).data('tipetransaksi');
    let id = $(this).data('iditem');
    let urlajaxparams = base_url + 'admin/deleteitem/' + transaksi + '/' + id;
    let ajaxparams = {
      urlajax: urlajaxparams,
      username: 'deleteitem9009',
      actiononcomplete: ''
    };
    ajaxfunction(ajaxparams);
  });
}
$('button.button-cari').on('click', function(event) {
  $('div.isimodal').empty();
  let isicari = `
  <div class="modal-header">
  <h5 class="modal-title">CARI</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <div class="my-3 btncari">
  <button class="btn btn-primary btn-sm py-0 d-block mx-auto pilihcari" onclick="initbuttoncari('hp_in')">HP MASUK</button>
  </div>
  <div class="my-3 btncari">
  <button class="btn btn-primary btn-sm py-0 d-block mx-auto pilihcari" onclick="initbuttoncari('hp_out')">HP TERJUAL</button>
  </div>
  <div class="my-3 btncari">
  <button class="btn btn-primary btn-sm py-0 d-block mx-auto pilihcari" onclick="initbuttoncari('servis_out')">SERVIS SELESAI</button>
  </div>
  <div class="my-3 btncari">
  <button class="btn btn-primary btn-sm py-0 d-block mx-auto pilihcari" onclick="initbuttoncari('servis_return')">SERVIS RETURN</button>
  </div>
  <div class="my-3 btncari">
  <button class="btn btn-primary btn-sm py-0 d-block mx-auto pilihcari" onclick="initbuttoncari('accesoris')">ACCESORIS</button>
  </div>
  <div class="my-3 btncari">
  <button class="btn btn-primary btn-sm py-0 d-block mx-auto pilihcari" onclick="initbuttoncari('all')">SEMUA</button>
  </div>
  </div>`;
  $('div.isimodal').html(isicari);
});

function initbuttoncari(tipeitem) {
  switch (tipeitem) {
    case 'hp_in':
      formcari(0);
      break;
    case 'hp_out':
      formcari(1);
      break;
    case 'servis_out':
      formcari(2);
      break;
    case 'servis_return':
      formcari(3);
      break;
    case 'accesoris':
      formcari(4);
      break;
    case 'all':
      formcari(5);
      break;
    default:
      break;
  }
}

function formcari(tipeitem) {
  let item = ['HP MASUK', 'HP TERJUAL', 'SERVIS MASUK', 'SERVIS RETURN', 'ACCESORIS', 'SEMUA'];
  let formcari = ``;
  let namainput = null;
  if (tipeitem == 5) {
    namainput = ['Kata kunci pencarian'];
    stringinput = getstringinputform(namainput, tipeitem, item);
  } else if (tipeitem == 4) {
    namainput = ['accesoris'];
    stringinput = getstringinputform(namainput, tipeitem, item);
  } else if ((tipeitem == 2) || (tipeitem == 3)) {
    namainput = ['Merk', 'Tipe', 'imei atau kerusakan'];
    stringinput = getstringinputform(namainput, tipeitem, item);
  } else {
    namainput = ['Merk', 'Tipe', 'imei'];
    stringinput = getstringinputform(namainput, tipeitem, item);
  }
  formcari += stringinput;
  $('div.isimodal').empty();
  $('div.isimodal').html(formcari);
}

function getstringinputform(namainput, tipeitem, item) {
  let stringinput = `
  <div class="modal-header">
  <h5 class="modal-title">CARI ` + item[tipeitem] + `</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <form action="javascript:submitcari(` + tipeitem + `)" class="formcari">
  <div class="modal-body">
  <div class="formclass my-3">
  `;
  namainput.forEach(function(element) {
    stringinput += `
    <div class="form-group row my-2">
    <label for="formGroupmerk" class="col-4 col-form-label col-form-label-sm">` + element + `</label>
    <div class="col-8">
    <input type="text" class="inputform form-control form-control-sm" id="formGroupmerk" placeholder="Masukkan ` + element + ` (boleh kosong)">
    </div>
    </div>
    `;
  });
  stringinput += `
  </div>
  </div>
  <div class="modal-footer">
  <button type="submit" class="btn btn-sm btn-success py-0 rounded submitedititem">CARI</button>
  </div>
  </form>
  `;
  return stringinput;
}

function submitcari(tipeitem) {
  let tipe = ['hm', 'hk', 'ss', 'sr', 'acc', 'all'];
  let urlcari = base_url + 'admin/cari/' + tipe[tipeitem];
  let isiform = $('.isimodal form.formcari').find('.inputform');
  for (let i = 0; i < isiform.length; i++) {
    let urlcarisegements = isiform.eq(i).val();
    if (urlcarisegements == '') {
      urlcarisegements = '_';
    } else {
      urlcarisegements = urlcarisegements.split(" ");
      urlcarisegements = urlcarisegements.join('_');
    }
    urlcari += '/' + urlcarisegements;
  }
  location.href = urlcari;
}