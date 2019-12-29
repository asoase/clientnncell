<script type="text/javascript">
	var datarekap = {
		vhpin : [],
		vhpout : [],
		vservisreturn : [],
		vservisdone : [],
		vacc : []
	};
</script>

<script type="text/javascript">
	let inputtext;
	let method;
	let value = 'value="';
	let ps = '"'; //penutup string
	let textsubmit;

	function hpout(isadd = true, index = 0){
		inputtext = 'Hp Terjual';
		let temphpout = {};
		let allselect = {jaringan:[],garansi:[], ram:[], rom:[], kelengkapan:[]};
		method = 'javascript:addtotable('+'false,'+index+')';
		if(isadd){
			method = 'javascript:addtotable()';
			temphpout.merk = '';
			temphpout.tipe = '';
			temphpout.imei = '';
			temphpout.harga_awal = '';
			temphpout.terjual = '';
			temphpout.kerusakan = '';
			temphpout.sales = '';
			temphpout.catatan = '';
			textsubmit = 'Tambahkan';
		} else {
			let inputan = datarekap.vhpout[index].merk;
			temphpout.merk = value+ inputan +ps;
			inputan = datarekap.vhpout[index].tipe;
			temphpout.tipe = value+ inputan +ps;
			inputan = datarekap.vhpout[index].imei;
			temphpout.imei = value+ inputan +ps;
			inputan = datarekap.vhpout[index].harga_awal;
			temphpout.harga_awal = value+ inputan +ps;
			inputan = datarekap.vhpout[index].terjual;
			temphpout.terjual = value+ inputan +ps;
			inputan = datarekap.vhpout[index].kerusakan;
			temphpout.kerusakan = value+ inputan +ps;
			inputan = datarekap.vhpout[index].sales;
			temphpout.sales = value+ inputan +ps;
			inputan = datarekap.vhpout[index].catatan;
			temphpout.catatan = value+ inputan +ps;

			inputan = datarekap.vhpout[index].jaringan;
			console.log(inputan);
			switch(inputan){
				case '5G': 
				allselect.jaringan[0] = 'selected';
				break;
				case '4G':
				allselect.jaringan[1] = 'selected';
				break;
				case '3G':
				allselect.jaringan[2] = 'selected';
				break;
				case 'E':
				allselect.jaringan[3] = 'selected';
				break;
				case 'TANPA SIM':
				allselect.jaringan[4] = 'selected';
				break;
			}

			inputan = datarekap.vhpout[index].garansi;
			switch(inputan){
				case 'tidak ada': 
				allselect.garansi[0] = 'selected';
				break;
				case 'distributor':
				allselect.garansi[1] = 'selected';
				break;
				case 'resmi':
				allselect.garansi[2] = 'selected';
				break;
			}

			inputan = datarekap.vhpout[index].ram;
			switch(inputan){
				case '0.25':
				allselect.ram[0] = 'selected';
				break;
				case '0.5':
				allselect.ram[1] = 'selected';
				break;
				case '1':
				allselect.ram[2] = 'selected';
				break;
				case '1.5':
				allselect.ram[3] = 'selected';
				break;
				case '2':
				allselect.ram[4] = 'selected';
				break;
				case '3':
				allselect.ram[5] = 'selected';
				break;
				case '4':
				allselect.ram[6] = 'selected';
				break;
			}

			inputan = datarekap.vhpout[index].rom;
			switch(inputan){
				case '4': 
				allselect.rom[0] = 'selected';
				break;
				case '8':
				allselect.rom[1] = 'selected';
				break;
				case '16':
				allselect.rom[2] = 'selected';
				break;
				case '32':
				allselect.rom[3] = 'selected';
				break;
				case '64':
				allselect.rom[4] = 'selected';
				break;
				case '128':
				allselect.rom[5] = 'selected';
				break;

			}

			inputan = datarekap.vhpout[index].kelengkapan;
			switch(inputan){
				case 'hp dus cas headset':
				allselect.kelengkapan[0] = 'selected';
				break;
				case 'hp dus cas':
				allselect.kelengkapan[1] = 'selected';
				break;
				case 'hp dus':
				allselect.kelengkapan[3] = 'selected';
				break;
				case 'hp cas':
				allselect.kelengkapan[4] = 'selected';
				break;
				case 'hp':
				allselect.kelengkapan[5] = 'selected';
				break;
			}

			textsubmit = 'Edit';
		}

		var textAppend = `
		<form class="needs-validation" action="`+method+`">
		<div class="form-group row">
		<label for="validationDefault01" class="col-sm-2 col-form-label col-form-label-sm">Merk</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Merk" `+temphpout.merk+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipe</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Tipe" `+temphpout.tipe+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">imei</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan imei" `+temphpout.imei+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">jaringan</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="5G" `+allselect.jaringan[0]+`>5G</option>
		<option value="4G" `+allselect.jaringan[1]+`>4G</option>
		<option value="3G" `+allselect.jaringan[2]+`>3G</option>
		<option value="E" `+allselect.jaringan[3]+`>E</option>
		<option value="TANPA SIM" `+allselect.jaringan[4]+`>TANPA SIM</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">garansi</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="tidak ada" `+allselect.garansi[0]+`>tidak ada</option>
		<option value="distributor" `+allselect.garansi[1]+`>distributor</option>
		<option value="resmi" `+allselect.garansi[2]+`>resmi</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ram</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="0.25" `+allselect.ram[0]+`>0.25</option>
		<option value="0.5" `+allselect.ram[1]+`>0.5</option>
		<option value="1" `+allselect.ram[2]+`>1</option>
		<option value="1.5" `+allselect.ram[3]+`>1.5</option>
		<option value="2" `+allselect.ram[4]+`>2</option>
		<option value="3" `+allselect.ram[5]+`>3</option>
		<option value="4" `+allselect.ram[6]+`>4</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">rom</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="4" `+allselect.rom[0]+`>4</option>
		<option value="8" `+allselect.rom[1]+`>8</option>
		<option value="16" `+allselect.rom[2]+`>16</option>
		<option value="32" `+allselect.rom[3]+`>32</option>
		<option value="64" `+allselect.rom[4]+`>64</option>
		<option value="128" `+allselect.rom[5]+`>128</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Harga Awal</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" `+temphpout.harga_awal+` placeholder="Masukkan Harga Awal" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Terjual</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" `+temphpout.terjual+` placeholder="Masukkan Harga Terjual" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">kelengkapan</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="hp dus cas headset" `+allselect.kelengkapan[0]+`>hp dus cas headset</option>
		<option value="hp dus cas" `+allselect.kelengkapan[1]+`>hp dus cas</option>
		<option value="hp dus" `+allselect.kelengkapan[2]+`>hp dus</option>
		<option value="hp cas" `+allselect.kelengkapan[3]+`>hp cas</option>
		<option value="hp" `+allselect.kelengkapan[4]+`>hp saja</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kerusakan</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+temphpout.kerusakan+` placeholder="Masukkan Kerusakan">
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Sales</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+temphpout.sales+` placeholder="Masukkan Sales" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Catatan</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+temphpout.catatan+` placeholder="Masukkan Catatan (tidak harus diisi)">
		</div>
		</div>
		<button type="submit" class="btn btn-primary btn-sm">`+textsubmit+`</button>
		</form>
		`;
		$('.modal-title').text(inputtext);
		$('.modal-body').empty();
		$('.modal-body').append(textAppend);
	}

	function hpin(isadd = true, index = 0){
		inputtext = 'Hp Masuk';
		let temphpin = {};
		let allselect = {jaringan:[],garansi:[], ram:[], rom:[], kelengkapan:[]};
		method = 'javascript:addtotable('+'false,'+index+')';
		if(isadd){
			method = 'javascript:addtotable()';
			temphpin.merk = '';
			temphpin.tipe = '';
			temphpin.imei = '';
			temphpin.harga = '';
			temphpin.kerusakan = '';
			temphpin.sales = '';
			temphpin.catatan = '';
			textsubmit = 'Tambahkan';
		} else {
			let inputan = datarekap.vhpin[index].merk;
			temphpin.merk = value+ inputan +ps;
			inputan = datarekap.vhpin[index].tipe;
			temphpin.tipe = value+ inputan +ps;
			inputan = datarekap.vhpin[index].imei;
			temphpin.imei = value+ inputan +ps;
			inputan = datarekap.vhpin[index].harga;
			temphpin.harga = value+ inputan +ps;
			inputan = datarekap.vhpin[index].kerusakan;
			temphpin.kerusakan = value+ inputan +ps;
			inputan = datarekap.vhpin[index].sales;
			temphpin.sales = value+ inputan +ps;
			inputan = datarekap.vhpin[index].catatan;
			temphpin.catatan = value+ inputan +ps;

			inputan = datarekap.vhpin[index].jaringan;
			switch(inputan){
				case '5G': 
				allselect.jaringan[0] = 'selected';
				break;
				case '4G':
				allselect.jaringan[1] = 'selected';
				break;
				case '3G':
				allselect.jaringan[2] = 'selected';
				break;
				case 'E':
				allselect.jaringan[3] = 'selected';
				break;
				case 'TANPA SIM':
				allselect.jaringan[4] = 'selected';
				break;
			}

			inputan = datarekap.vhpin[index].garansi;
			switch(inputan){
				case 'tidak ada': 
				allselect.garansi[0] = 'selected';
				break;
				case 'distributor':
				allselect.garansi[1] = 'selected';
				break;
				case 'resmi':
				allselect.garansi[2] = 'selected';
				break;
			}

			inputan = datarekap.vhpin[index].ram;
			switch(inputan){
				case '0.25':
				allselect.ram[0] = 'selected';
				break;
				case '0.5':
				allselect.ram[1] = 'selected';
				break;
				case '1':
				allselect.ram[2] = 'selected';
				break;
				case '1.5':
				allselect.ram[3] = 'selected';
				break;
				case '2':
				allselect.ram[4] = 'selected';
				break;
				case '3':
				allselect.ram[5] = 'selected';
				break;
				case '4':
				allselect.ram[6] = 'selected';
				break;
			}

			inputan = datarekap.vhpin[index].rom;
			switch(inputan){
				case '4': 
				allselect.rom[0] = 'selected';
				break;
				case '8':
				allselect.rom[1] = 'selected';
				break;
				case '16':
				allselect.rom[2] = 'selected';
				break;
				case '32':
				allselect.rom[3] = 'selected';
				break;
				case '64':
				allselect.rom[4] = 'selected';
				break;
			}

			inputan = datarekap.vhpin[index].kelengkapan;
			switch(inputan){
				case 'hp dus cas headset':
				allselect.kelengkapan[0] = 'selected';
				break;
				case 'hp dus cas':
				allselect.kelengkapan[1] = 'selected';
				break;
				case 'hp dus':
				allselect.kelengkapan[3] = 'selected';
				break;
				case 'hp cas':
				allselect.kelengkapan[4] = 'selected';
				break;
				case 'hp':
				allselect.kelengkapan[5] = 'selected';
				break;
			}

			textsubmit = 'Edit';
		}
		
		var textAppend = `
		<form class="needs-validation" action="`+method+`">
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Merk</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Merk" `+temphpin.merk+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipe</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+temphpin.tipe+` placeholder="Masukkan Tipe" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">imei</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" `+temphpin.imei+` placeholder="Masukkan imei" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">jaringan</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="5G" `+allselect.jaringan[0]+`>5G</option>
		<option value="4G" `+allselect.jaringan[1]+`>4G</option>
		<option value="3G" `+allselect.jaringan[2]+`>3G</option>
		<option value="E" `+allselect.jaringan[3]+`>E</option>
		<option value="TANPA SIM" `+allselect.jaringan[4]+`>TANPA SIM</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">garansi</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="tidak ada" `+allselect.garansi[0]+`>tidak ada</option>
		<option value="distributor" `+allselect.garansi[1]+`>distributor</option>
		<option value="resmi" `+allselect.garansi[2]+`>resmi</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ram</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="0.25" `+allselect.ram[0]+`>0.25</option>
		<option value="0.5" `+allselect.ram[1]+`>0.5</option>
		<option value="1" `+allselect.ram[2]+`>1</option>
		<option value="1.5" `+allselect.ram[3]+`>1.5</option>
		<option value="2" `+allselect.ram[4]+`>2</option>
		<option value="3" `+allselect.ram[5]+`>3</option>
		<option value="4" `+allselect.ram[6]+`>4</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">rom</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="4" `+allselect.rom[0]+`>4</option>
		<option value="8" `+allselect.rom[1]+`>8</option>
		<option value="16" `+allselect.rom[2]+`>16</option>
		<option value="32" `+allselect.rom[3]+`>32</option>
		<option value="64" `+allselect.rom[4]+`>64</option>
		<option value="128" `+allselect.rom[5]+`>128</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" `+temphpin.harga+` placeholder="Masukkan Harga" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">kelengkapan</label>
		<div class="col-sm-10">
		<select class="custom-select custom-select-sm" id="selectFormsm">
		<option value="hp dus cas headset" `+allselect.kelengkapan[0]+`>hp dus cas headset</option>
		<option value="hp dus cas" `+allselect.kelengkapan[1]+`>hp dus cas</option>
		<option value="hp dus" `+allselect.kelengkapan[2]+`>hp dus</option>
		<option value="hp cas" `+allselect.kelengkapan[3]+`>hp cas</option>
		<option value="hp" `+allselect.kelengkapan[4]+`>hp saja</option>
		</select>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kerusakan</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+temphpin.kerusakan+` placeholder="Masukkan Kerusakan">
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Sales</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+temphpin.sales+` placeholder="Masukkan Sales" required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Catatan</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+temphpin.catatan+` placeholder="Masukkan Catatan (tidak harus diisi)">
		</div>
		</div>
		<button type="submit" class="btn btn-primary btn-sm">`+textsubmit+`</button>
		</form>
		`;
		$('.modal-title').text(inputtext);
		$('.modal-body').empty();
		$('.modal-body').append(textAppend);
	}
	function servis(isservisdone = true, isadd = true, index = 0){
		inputtext = (isservisdone) ? "Servis Selesai":"Servis Return";
		tempservis = {};
		method = 'javascript:addtotable('+'false,'+index+')';
		//cek if edit
		if(isadd){
			method = 'javascript:addtotable()';
			tempservis.merk = '';
			tempservis.tipe = '';
			tempservis.imei = '';
			tempservis.kerusakan = '';
			tempservis.biaya = '';
			tempservis.teknisi = '';
			tempservis.catatan = '';
			textsubmit = 'Tambahkan';
		} else {
			let inputan = (isservisdone)?datarekap.vservisdone[index].merk:datarekap.vservisreturn[index].merk;
			tempservis.merk = value+ inputan +ps;
			inputan = (isservisdone)?datarekap.vservisdone[index].tipe:datarekap.vservisreturn[index].tipe;
			tempservis.tipe = value+ inputan +ps;
			inputan = (isservisdone)?datarekap.vservisdone[index].imei:datarekap.vservisreturn[index].imei;
			tempservis.imei = value+ inputan +ps;
			inputan = (isservisdone)?datarekap.vservisdone[index].kerusakan:datarekap.vservisreturn[index].kerusakan;
			tempservis.kerusakan = value+ inputan +ps;
			inputan = (isservisdone)?datarekap.vservisdone[index].biaya:datarekap.vservisreturn[index].biaya;
			tempservis.biaya = value+ inputan +ps;
			inputan = (isservisdone)?datarekap.vservisdone[index].teknisi:datarekap.vservisreturn[index].teknisi;
			tempservis.teknisi = value+ inputan +ps;
			inputan = (isservisdone)?datarekap.vservisdone[index].catatan:datarekap.vservisreturn[index].catatan;
			tempservis.catatan = value+ inputan +ps;
			textsubmit = 'Edit';
		}

		var textAppend = `
		<form class="needs-validation" action="`+method+`">
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Merk</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Merk" `+tempservis.merk+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tipe</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Tipe" `+tempservis.tipe+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">imei</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan imei" `+tempservis.imei+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kerusakan</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Kerusakan" `+tempservis.kerusakan+`>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Biaya</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Biaya" `+tempservis.biaya+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Teknisi</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Teknisi" `+tempservis.teknisi+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Catatan</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" `+tempservis.catatan+` placeholder="Masukkan Catatan (tidak harus diisi)">
		</div>
		</div>
		<button type="submit" class="btn btn-primary btn-sm">`+textsubmit+`</button>
		</form>
		`;
		$('.modal-title').text(inputtext);
		$('.modal-body').empty();
		$('.modal-body').append(textAppend);
	}
	function accesoris(add = true, index = 0){
		inputtext = 'Accesoris';
		let tempacc = {}
		method = 'javascript:addtotable('+'false,'+index+')';
		// console.log('javascript:addtotable('+false','+index+')');
		//cek if edit
		if(add){
			method = 'javascript:addtotable()';
			tempacc.nama = '';
			tempacc.harga = '';
			tempacc.catatan = '';
			textsubmit = 'Tambahkan';
		} else {
			tempacc.nama = value+datarekap.vacc[index].nama+ps;
			tempacc.harga = value+datarekap.vacc[index].harga+ps;
			tempacc.catatan = value+datarekap.vacc[index].catatan+ps;
			textsubmit = 'Edit';
		}
		var textAppend = `
		<form class="needs-validation" action="`+method+`">
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Barang</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Nama Barang" `+tempacc.nama+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
		<div class="col-sm-10">
		<input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Harga" `+tempacc.harga+` required>
		</div>
		</div>
		<div class="form-group row">
		<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Catatan</label>
		<div class="col-sm-10">
		<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Masukkan Catatan (tidak harus diisi)" `+tempacc.catatan+`>
		</div>
		</div>
		<button type="submit" class="btn btn-primary btn-sm">`+textsubmit+`</button>
		</form>
		`;
		$('.modal-title').text(inputtext);
		$('.modal-body').empty();
		$('.modal-body').append(textAppend);
	}

	$('.btdropdown').click(
		function(){
			let inputtext = $(this).text();
			switch(inputtext) {
				case 'Hp Masuk':
				hpin();
				break;
				case 'Hp Terjual':
				hpout();
				break;
				case 'Servis Selesai':
				servis();
				break;
				case 'Servis Return':
				servis(false);
				break;
				case 'Accesoris':
				accesoris();
				break;
				default:
				break;
			}}
			);

	var mmain = angular.module("mainapp", []);
	mmain.controller('cmain', function($scope) {
		$scope.readypost = function(){
			let isreadytopost = false;
			if((datarekap.vhpin.length > 0) || (datarekap.vhpout.length > 0) ||
				(datarekap.vservisreturn.length > 0) || (datarekap.vservisdone.length > 0) || (datarekap.vacc.length > 0)) 
				isreadytopost = true;
			return isreadytopost;
		},
		$scope.ontable = {
			isshow: function(index0){
				var toout = false;
				switch(index0) {
					case 0:
					toout = (datarekap.vhpin.length > 0) ? true : false;
					break;
					case 1:
					toout = (datarekap.vhpout.length > 0) ? true : false;
					break;
					case 2:
					toout = (datarekap.vservisdone.length > 0) ? true : false;
					break;
					case 3:
					toout = (datarekap.vservisreturn.length > 0) ? true : false;
					break;
					case 4:
					toout = (datarekap.vacc.length > 0) ? true : false;
					break;
					default:
					break;
				}
				return toout;}
			},
			$scope.shpins = {
				sout: datarekap.vhpin
			},
			$scope.shpouts = {
				sout: datarekap.vhpout
			},
			$scope.sservrets = {
				sout: datarekap.vservisreturn
			},
			$scope.sservdon = {
				sout: datarekap.vservisdone
			},
			$scope.sacc = {
				sout: datarekap.vacc
			},
			$scope.editorremoveitem = function(code, index, isremove = true){
				feditremoveitem(code, index, isremove);
			},
			setInterval(function(){
				$scope.$apply();
			}, 1000);
		});

	function feditremoveitem(code, index, isremove = true){
		switch(code){
			case 'chin':
			if(isremove) datarekap.vhpin.splice(index, 1);
			else hpin(false, index);
			break;
			case 'chout':
			if(isremove) datarekap.vhpout.splice(index, 1);
			else hpout(false, index);
			break;
			case 'csdone':
			if(isremove) datarekap.vservisdone.splice(index, 1);
			else servis(true, false, index);
			break;
			case 'csret':
			if(isremove) datarekap.vservisreturn.splice(index, 1);
			else servis(false, false, index);
			break;
			case 'cacc':
			if(isremove) datarekap.vacc.splice(index, 1);
			else accesoris(false, index);
			break;
			default:
			break;
		}
	}

	$('#submitdata0110').submit(function() {
		let usernameinput = 'jamah1001';
		let inputsubmit0110 = $('.hiddeninput0110');
		let datepicker = $('.datepicker0110');
		if(datepicker.val() == '') {
			alert('Tanggal Belum Diisi');
			return false;
		}

		inputsubmit0110.eq(0).val(datepicker.val());
		inputsubmit0110.eq(1).val(usernameinput);
		inputsubmit0110.eq(2).val(JSON.stringify(datarekap));
		return true;
	});

	function addtotable(isadd = true, index = 0){
		switch(inputtext) {
			case 'Hp Masuk':
			addhpin(isadd, index);
			break;
			case 'Hp Terjual':
			addhpout(isadd, index);
			break;
			case 'Servis Selesai':
			addservis(true, isadd, index);
			break;
			case 'Servis Return':
			addservis(false, isadd, index);
			break;
			case 'Accesoris':
			addaccesoris(isadd, index);
			break;
			default:
			break;
		}
		$('#inputmodal').modal('hide');
	}

	function addhpin(isadd = true, index = 0){
		let temp = {};
		let inputsbody = $('.modal-body').find('input#colFormLabelSm');
		let selectinputs = $('.modal-body').find('select#selectFormsm');
		temp.merk = inputsbody.eq(0).val();
		temp.tipe = inputsbody.eq(1).val();
		temp.imei = inputsbody.eq(2).val();
		temp.harga = inputsbody.eq(3).val();
		temp.kerusakan = inputsbody.eq(4).val();
		temp.sales = inputsbody.eq(5).val();
		temp.catatan = inputsbody.eq(6).val();
		temp.jaringan = selectinputs.eq(0).val();
		temp.garansi = selectinputs.eq(1).val();
		temp.ram = selectinputs.eq(2).val();
		temp.rom = selectinputs.eq(3).val();
		temp.kelengkapan = selectinputs.eq(4).val();
		if(isadd) datarekap.vhpin.push(temp);
		else datarekap.vhpin.splice(index, 1, temp);
	}

	function addhpout(isadd = true, index = 0){
		let temp = {};
		let inputsbody = $('.modal-body').find('input#colFormLabelSm');
		let selectinputs = $('.modal-body').find('select#selectFormsm');
		temp.merk = inputsbody.eq(0).val();
		temp.tipe = inputsbody.eq(1).val();
		temp.imei = inputsbody.eq(2).val();
		temp.harga_awal = inputsbody.eq(3).val();
		temp.terjual = inputsbody.eq(4).val();
		temp.kerusakan = inputsbody.eq(5).val();
		temp.sales = inputsbody.eq(6).val();
		temp.catatan = inputsbody.eq(7).val();
		temp.jaringan = selectinputs.eq(0).val();
		temp.garansi = selectinputs.eq(1).val();
		temp.ram = selectinputs.eq(2).val();
		temp.rom = selectinputs.eq(3).val();
		temp.kelengkapan = selectinputs.eq(4).val();
		if(isadd) datarekap.vhpout.push(temp);
		else datarekap.vhpout.splice(index, 1, temp);
	}

	function addservis(isdone = true, isadd = true, index = 0){
		let temp = {};
		let inputsbody = $('.modal-body').find('input#colFormLabelSm');
		temp.merk = inputsbody.eq(0).val();
		temp.tipe = inputsbody.eq(1).val();
		temp.imei = inputsbody.eq(2).val();
		temp.kerusakan = inputsbody.eq(3).val();
		temp.biaya = inputsbody.eq(4).val();
		temp.teknisi = inputsbody.eq(5).val();
		temp.catatan = inputsbody.eq(6).val();
		if(isadd) isdone ? datarekap.vservisdone.push(temp):datarekap.vservisreturn.push(temp);
		else isdone ? datarekap.vservisdone.splice(index, 1, temp):datarekap.vservisreturn.splice(index, 1, temp);
	}

	function addaccesoris(isadd = true, index = 0){
		let temp = {};
		let inputsbody = $('.modal-body').find('input#colFormLabelSm');
		temp.nama = inputsbody.eq(0).val();
		temp.harga = inputsbody.eq(1).val();
		temp.catatan = inputsbody.eq(2).val();
		if(isadd) datarekap.vacc.push(temp);
		else datarekap.vacc.splice(index, 1, temp);
	}

</script>

<script>
	$('#inputmodal').on('shown.bs.modal', function (e) {
		loopvalidation(true);
	});
	$('#inputmodal').on('hide.bs.modal', function (e) {
		loopvalidation(false);
	});

	function loopvalidation(cond){
		cond ? (isloop = setInterval(doclick, 1000)) : clearInterval(isloop);
	}

	function doclick(){
		let forms = document.getElementsByClassName('needs-validation');
		let validation = Array.prototype.filter.call(forms, function(form) {
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