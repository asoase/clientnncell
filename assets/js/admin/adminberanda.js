/**
 * Bootstrap Accordion header active v1.0
 * Manu Morante @unavezfui
 * Last update: 20/10/2014
 * https://codepen.io/unavezfui/pen/HibzA
 */
 (function() {
 	$(".judul-list1").on("show.bs.collapse hide.bs.collapse", function(e) {
 		if (e.type=='show'){
 			$(this).addClass('active');
 		}else{
 			$(this).removeClass('active');
 		}
 	});
 }).call(this);

 (function(){
 	let children = $('.headeraktif').data('headeraktif');
 	$('.headeraktif li:nth-child('+children+')').addClass('active');
 }).call(this);

 $('button.bt-detail-hari').on('click', function(event){
 	let transaksi = $(this).data('transaksi');
 	let id = $(this).data('iditem');
 	let urlajax = base_url+'admin/isidetail/'+transaksi+'/'+id;
 	detailajax(urlajax);
 });

 function detailajax(urlajax){
 	$.ajax({
 		url: urlajax,
 		data: {username: 'isidetail9009'},
 		type: 'POST',
 		beforeSend: function(){
 			nowloading();
 		},
 		success: function(data){
 			isidetail(data);
 		},
 		complete: function(){
 			initedit();
 		}
 	});
 }

 function nowloading(){
 	htmlloading = 
 	`
 	<div class="text-center">
 	<div class="spinner-border text-info" role="status">
 	<span class="sr-only">Loading...</span>
 	</div>
 	</div>
 	`;
 	$('div.isidetail').html(htmlloading);
 }

 function isidetail(data){
 	$('div.isidetail').html(data);
 }

 function initedit(){
 	$('.isidetail .modal-footer .edititem').click(function(){
 		let transaksi = $(this).data('tipetransaksi');
 		let id = $(this).data('iditem');
 		let urlajax = base_url+'admin/editdetail/'+transaksi+'/'+id;
 		editajax(urlajax);
 	});
 }

 function editajax(urlajax){
 	$.ajax({
 		url: urlajax,
 		data: {username: 'editdetail9009'},
 		type: 'POST',
 		beforeSend: function(){
 			nowloading();
 		},
 		success: function(data){
 			isidetail(data);
 		},
 		complete: function(data){
 			initsubmitedit();
 		}
 	});
 }

 // untuk mendapatkan nilai
 function initsubmitedit(){
 	$('.isidetail .modal-footer .submitedititem').click(function(){
 		alert('ladalah');
 	});
 	// let selectmenu = $('.isidetail .modal-body .table-responsive .table-striped').find('select#selectFormsm'){
 	// 	for (var i = 0; i < 6; i++) {
 	// 		let indexselect = selectmenu.eq(i).data('indexselect');
 	// 		selectmenu.eq(i).find('option:eq(indexselect)').attr('selected', true);
 	// 	}
 	// }
 }