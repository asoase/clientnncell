/**
 * Bootstrap Accordion header active v1.0
 * Manu Morante @unavezfui
 * Last update: 20/10/2014
 * https://codepen.io/unavezfui/pen/HibzA
 */
(function() {
  $(".judul-list1").on("show.bs.collapse hide.bs.collapse", function(e) {
    if (e.type == 'show') {
      $(this).addClass('active');
    } else {
      $(this).removeClass('active');
    }
  });
}).call(this);
// button detail hari ketika di click mengisi modal dengan table berisi detail item yang di click
$('button.bt-detail-hari').on('click', function(event) {
  let transaksi = $(this).data('transaksi');
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