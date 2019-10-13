<script>
	var dateinput;

	function changedateajax(){
		let datapost = {tanggal: dateinput, password: 'jamah0110'};
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "/main/ncell/detailberanda/",
			data: datapost,
			success: function(dataout, textStatus, jQxhr){
				$('#detailtransaksi').html(dataout);
			},
			error: function(jqXhr, textStatus, errorThrown){
				alert(jqXhr);
				alert(textStatus);
				alert(errorThrown);
			}
		});
	}
	$.fn.myFunction = function() { 
		changedateajax();
	}
	$(".datepicker0110").change(function(){
		dateinput = $(".datepicker0110").val();
		$(this).myFunction();
	});
	function changeweek(tanggal){
		dateinput = tanggal;
		changedateajax();
	}

	function editorremoveitem(codeid, idid, isremoveid = true){
		switch(codeid){
			case 'hin':
			$('#modallabel').text('HP MASUK');
			break;
			case 'hout':
			$('#modallabel').text('HP TERJUAL');
			break;
			case 'servout':
			$('#modallabel').text('SERVIS SELESAI');
			break;
			case 'servreturn':
			$('#modallabel').text('SERVIS RETURN');
			break;
			case 'acc':
			$('#modallabel').text('ACCESORIS');
			break;
		}
		let spinner = `<div class="d-flex justify-content-center">
										<div class="spinner-border" role="status">
											<span class="sr-only">Loading...</span>
										</div>
									</div>`;
		$('.modal-body').empty();
		$('.modal-body').append(spinner);
		let datapost = {id: idid, code: codeid, isremove: isremoveid, password: 'jamah0110'};
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "/main/ncell/bodydialog/",
			data: datapost,
			success: function(dataout, textStatus, jQxhr){
				$('.modal-body').html(dataout);
			},
			error: function(jqXhr, textStatus, errorThrown){
				$('.modal-body').html("<p>koneksi error<p>");
			}
		});
		$('#inputmodal').modal('show');
	}

	function editsubmit(){
		alert('setelah submit');
	}
</script>