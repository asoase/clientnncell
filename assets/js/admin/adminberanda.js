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
(function() {
  let children = $('.headeraktif').data('headeraktif');
  $('.headeraktif li:nth-child(' + children + ')').addClass('active');
}).call(this);

function nowloading() {
  htmlloading = `
  <div class="text-center">
  <div class="spinner-border text-info" role="status">
  <span class="sr-only">Loading...</span>
  </div>
  </div>
  `;
  $('div.isidetail').html(htmlloading);
}

function isidetail(data) {
  $('div.isidetail').html(data);
}
$('button.bt-detail-hari').on('click', function(event) {
  let transaksi = $(this).data('transaksi');
  let id = $(this).data('iditem');
  let urlajax = base_url + 'admin/isidetail/' + transaksi + '/' + id;
  detailajax(urlajax);
});

function detailajax(urlajax) {
  $.ajax({
    url: urlajax,
    data: {
      username: 'isidetail9009'
    },
    type: 'POST',
    beforeSend: function() {
      nowloading();
    },
    success: function(data) {
      isidetail(data);
    },
    complete: function() {
      initedit();
    }
  });
}

function initedit() {
  $('.isidetail .modal-footer .edititem').click(function() {
    let transaksi = $(this).data('tipetransaksi');
    let id = $(this).data('iditem');
    let urlajax = base_url + 'admin/editdetail/' + transaksi + '/' + id;
    editajax(urlajax);
  });
}

function editajax(urlajax) {
  $.ajax({
    url: urlajax,
    data: {
      username: 'editdetail9009'
    },
    type: 'POST',
    beforeSend: function() {
      nowloading();
    },
    success: function(data) {
      isidetail(data);
    },
    complete: function(data) {
      initsubmitedit();
    }
  });
}
// untuk mendapatkan nilai
function initsubmitedit() {
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

function submitedit(tipetransaksi, iditem) {
  var dataput = {};
  let isiform = $('.isidetail form.formedit').find('.inputform');
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
  dataput = JSON.stringify(dataput);
  let urlajax = base_url + 'admin/submitedit/' + tipetransaksi + '/' + iditem;
  submiteditajax(urlajax, dataput);
}

function submiteditajax(urlajax, dataput) {
  let datasend = dataput;
  $.ajax({
    url: urlajax,
    data: {
      username: 'submitedit9009',
      datatoput: datasend
    },
    type: 'POST',
    beforeSend: function() {
      nowloading();
    },
    success: function(data) {
      isidetail(data);
    },
    complete: function(data) {}
  });
}