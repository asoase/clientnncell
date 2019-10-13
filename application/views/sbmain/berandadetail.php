<div class="row mb-3 justify-content-end">
	<div class="btn-group" role="group" aria-label="Basic example">
		<button type="button" class="btn btn-primary" id="lastweek" onclick="changeweek('<?= $transaksi['day']['lastweek'] ?>')">Minggu Sebelumnya</button>
		<button type="button" class="btn btn-warning" id="nextweek" onclick="changeweek('<?= $transaksi['day']['nextweek'] ?>')">Minggu Selanjutnya</button>
	</div>
</div>

<div class="row justify-content-center mb-4">
	<div class="col-md-5 col-sm-9 col-xs-9 badge badge-success pt-0 pb-0 mt-0 mb-0">
		<h3 class="mt-0 mb-0">Minggu <?= date("d M Y", strtotime($transaksi['day']['fromday'])); ?></h3>
	</div>
	<div class="col-md-1 col-sm-3 col-xs-3 text-center pt-0 bg-warning ml-2 mr-2 mt-1 mb-1">
		<h3 class="mt-0 mb-0">s/d</h3>
	</div>
	<div class="col-md-5 col-sm-9 col-xs-9 badge badge-success pt-0 pb-0 mt-0 mb-0">
		<h3 class="mt-0 mb-0">Sabtu <?= date("d M Y", strtotime($transaksi['day']['untilday'])); ?></h3>
	</div>
</div>

<!-- awal dari row  -->
<div class="row">

	<div class="card col-md-4">
		<div class="card-header pb-0 bg-info text-white text-center">
			<p class="mt-0">Ringkasan Data Transaksi</p>
		</div>
		<div class="card-body pt-1 pb-0">
			<p class="mt-0 mb-0">Hp Masuk : <?= count($transaksi['weeknow']['vhpin']); ?> (termasuk return)</p>
			<p class="mt-0 mb-0">Hp Terjual : <?= count($transaksi['weeknow']['vhpout']); ?> (termasuk return)</p>
			<p class="mt-0 mb-0">Servis selesai : <?= count($transaksi['weeknow']['vservisdone']); ?></p>
			<p class="mt-0 mb-0">Servis Return : <?= count($transaksi['weeknow']['vservisreturn']); ?></p>
			<p class="mt-0 mb-0">Accesoris : <?= count($transaksi['weeknow']['vacc']); ?></p>
		</div>
	</div>

	<div class="card col-md-4">
		<div class="card-header pb-0 bg-info text-white text-center">
			<p class="mt-0">Bonus Narko</p>
		</div>
		<div class="card-body pt-1 pb-0">
			<p class="mt-0 mb-0">Hp Masuk : <?= $transaksi['narko']['bhpin']['bhpinfix']; ?></p>
			<p class="mt-0 mb-0">Hp Terjual : <?= $transaksi['narko']['bhpout']['bhpoutfix']; ?></p>
			<p class="mt-0 mb-0">Servis : <?= $transaksi['narko']['bservis']['bservisfix']; ?></p>
			<p>
				<a class="badge-primary dropdown-toggle" data-toggle="collapse" href="#collapseDetailnarko" aria-expanded="false" aria-controls="collapseDetailnarko">
					Detail
				</a>
			</p>
			<div class="collapse" id="collapseDetailnarko">
				<div class="card card-body">
					<p class="badge badge-success">Hp Masuk</p>
					<?php if(sizeof($transaksi['narko']['bhpin']['ballin']) == 0): ?>
						<p>belum ada data</p>
					<?php else :
						foreach($transaksi['narko']['bhpin']['ballin'] as $value) :?>
							<p><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Hp Masuk Return</p>
					<?php if(sizeof($transaksi['narko']['bhpin']['ballinret']) == 0): ?>
						<p>belum ada data</p>
					<?php else :
						foreach($transaksi['narko']['bhpin']['ballinret'] as $value) :?>
							<p><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Hp Terjual</p>
					<?php if(sizeof($transaksi['narko']['bhpout']['ballout']) == 0): ?>
						<p>belum ada data</p>
					<?php else :
						foreach($transaksi['narko']['bhpout']['ballout'] as $value) :?>
							<p><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Hp Terjual Return</p>
					<?php if(sizeof($transaksi['narko']['bhpout']['balloutret']) == 0): ?>
						<p>belum ada data</p>
					<?php else :
						foreach($transaksi['narko']['bhpout']['balloutret'] as $value) :?>
							<p><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Servis</p>
					<?php if(sizeof($transaksi['narko']['bservis']['ballserv']) == 0): ?>
						<p>belum ada data</p>
					<?php else :
						foreach($transaksi['narko']['bservis']['ballserv'] as $value) :?>
							<p><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Servis Return</p>
					<?php if(sizeof($transaksi['narko']['bservis']['ballservret']) == 0): ?>
						<p>belum ada data</p>
					<?php else :
						foreach($transaksi['narko']['bservis']['ballservret'] as $value) :?>
							<p><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>

	<div class="card col-md-4">
		<div class="card-header pb-0 bg-info text-white text-center">
			<p class="mt-0">Bonus Sis</p>
		</div>
		<div class="card-body pt-1 pb-0">
			<p class="mt-0 mb-0">Hp Masuk : <?= $transaksi['sis']['bhpin']['bhpinfix']; ?></p>
			<p class="mt-0 mb-0">Hp Terjual : <?= $transaksi['sis']['bhpout']['bhpoutfix']; ?></p>
			<p class="mt-0 mb-0">Servis : <?= $transaksi['sis']['bservis']['bservisfix']; ?></p>
			<p>
				<a class="badge-primary dropdown-toggle" data-toggle="collapse" href="#collapseDetailsis" aria-expanded="false" aria-controls="collapseDetailsis">
					Detail
				</a>
			</p>
			<div class="collapse" id="collapseDetailsis">
				<div class="card card-body">
					<p class="badge badge-success">Hp Masuk</p>
					<?php if(sizeof($transaksi['sis']['bhpin']['ballin']) == 0): ?>
						<p class="text-body">belum ada data</p>
					<?php else :
						foreach($transaksi['sis']['bhpin']['ballin'] as $value) :?>
							<p class="text-body"><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Hp Masuk Return</p>
					<?php if(sizeof($transaksi['sis']['bhpin']['ballinret']) == 0): ?>
						<p class="text-body">belum ada data</p>
					<?php else :
						foreach($transaksi['sis']['bhpin']['ballinret'] as $value) :?>
							<p class="text-body"><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Hp Terjual</p>
					<?php if(sizeof($transaksi['sis']['bhpout']['ballout']) == 0): ?>
						<p class="text-body">belum ada data</p>
					<?php else :
						foreach($transaksi['sis']['bhpout']['ballout'] as $value) :?>
							<p class="text-body"><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Hp Terjual Return</p>
					<?php if(sizeof($transaksi['sis']['bhpout']['balloutret']) == 0): ?>
						<p class="text-body">belum ada data</p>
					<?php else :
						foreach($transaksi['sis']['bhpout']['balloutret'] as $value) :?>
							<p class="text-body"><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Servis</p>
					<?php if(sizeof($transaksi['sis']['bservis']['ballserv']) == 0): ?>
						<p class="text-body">belum ada data</p>
					<?php else :
						foreach($transaksi['sis']['bservis']['ballserv'] as $value) :?>
							<p class="text-body"><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>

					<p class="badge badge-success">Servis Return</p>
					<?php if(sizeof($transaksi['sis']['bservis']['ballservret']) == 0): ?>
						<p class="text-body">belum ada data</p>
					<?php else :
						foreach($transaksi['sis']['bservis']['ballservret'] as $value) :?>
							<p class="text-body"><?= $value ?></p>
						<?php endforeach;?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- akhir dari row -->

<div class="row">
	<div class="card text-white bg-primary mb-3 mt-3 col-12">
		<div class="card-header bg-info text-center">Detail Transaksi</div>
		<div class="card-body justify-content-center">

			<div class="bg-success">
				<h4 class="pl-1 pb-2 pt-2">
					<a class="badge badge-primary dropdown-toggle" data-toggle="collapse" href="#collapseminggu" role="button" aria-expanded="false" aria-controls="collapseminggu">
						Minggu <?= $transaksi['allday'][0]; ?>
					</a>
				</h4>
				<div class="collapse" id="collapseminggu">
					<div class="card card-body bg-dark bg-dark">

						<?php
						$nowdaytime = strtotime($transaksi['allday'][0]);
						$indextransaksi = [0, 0, 0, 0, 0]; ?>
						<div class="card">
							<div class="card-header bg-danger">
								HP MASUK
							</div>
							<div class="row card-body bg-primary">

								<?php
								$count = 0;
								foreach ($transaksi['weeknow']['vhpin'] as $value) :
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[0]++;
								endforeach;?>
								<?php if($indextransaksi[0] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpin'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>
										<?php endif;
									endforeach;?>
								<?php endif; ?>
								<?php if($indextransaksi[0] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								HP Terjual
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpout'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[1]++;
								}?>
								<?php if($indextransaksi[1] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpout'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++; ?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : <?= $value['harga_awal'].'/'.$value['terjual']; ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach; 
								endif; ?>
								<?php if($indextransaksi[1] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Selesai
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisdone'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[2]++;
								}?>
								<?php if($indextransaksi[2] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisdone'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[2] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Return
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$coutn = 0;
								foreach ($transaksi['weeknow']['vservisreturn'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[3]++;
								}?>
								<?php if($indextransaksi[3] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisreturn'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[3] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Accesoris
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vacc'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[4]++;
								}?>
								<?php if($indextransaksi[4] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vacc'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['nama'] ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[4] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="bg-success">
				<h4 class="pl-1 pb-2 pt-2">
					<a class="badge badge-primary dropdown-toggle" data-toggle="collapse" href="#collapsenin" role="button" aria-expanded="false" aria-controls="collapsenin">
						Senin <?= $transaksi['allday'][1] ?>
					</a>
				</h4>
				<div class="collapse" id="collapsenin">
					<div class="card card-body bg-dark">

						<?php
						$nowdaytime = strtotime($transaksi['allday'][1]);
						$indextransaksi = [0, 0, 0, 0, 0]; ?>

						<div class="card">
							<div class="card-header bg-danger">
								HP MASUK
							</div>
							<div class="row card-body bg-primary">

								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpin'] as $value) :
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[0]++;
								endforeach;?>
								<?php if($indextransaksi[0] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpin'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>
										<?php endif;
									endforeach;?>
								<?php endif; ?>
								<?php if($indextransaksi[0] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								HP Terjual
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpout'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[1]++;
								}?>
								<?php if($indextransaksi[1] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpout'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : <?= $value['harga_awal'].'/'.$value['terjual']; ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach; 
								endif; ?>
								<?php if($indextransaksi[1] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Selesai
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisdone'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[2]++;
								}?>
								<?php if($indextransaksi[2] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisdone'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[2] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Return
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisreturn'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[3]++;
								}?>
								<?php if($indextransaksi[3] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisreturn'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[3] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Accesoris
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vacc'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[4]++;
								}?>
								<?php if($indextransaksi[4] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vacc'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : 
											$count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['nama'] ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[4] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="bg-success">
				<h4 class="pl-1 pb-2 pt-2">
					<a class="badge badge-primary dropdown-toggle" data-toggle="collapse" href="#collapselasa" role="button" aria-expanded="false" aria-controls="collapselasa">
						Selasa <?= $transaksi['allday'][2] ?>
					</a>
				</h4>
				<div class="collapse" id="collapselasa">
					<div class="card card-body bg-dark">

						<?php
						$nowdaytime = strtotime($transaksi['allday'][2]);
						$indextransaksi = [0, 0, 0, 0, 0]; ?>

						<div class="card">
							<div class="card-header bg-danger">
								HP MASUK
							</div>
							<div class="row card-body bg-primary">

								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpin'] as $value) :
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[0]++;
								endforeach;?>
								<?php if($indextransaksi[0] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpin'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>
										<?php endif;
									endforeach;?>
								<?php endif; ?>
								<?php if($indextransaksi[0] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								HP Terjual
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpout'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[1]++;
								}?>
								<?php if($indextransaksi[1] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpout'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : <?= $value['harga_awal'].'/'.$value['terjual']; ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach; 
								endif; ?>
								<?php if($indextransaksi[1] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Selesai
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisdone'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[2]++;
								}?>
								<?php if($indextransaksi[2] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisdone'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[2] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Return
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisreturn'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[3]++;
								}?>
								<?php if($indextransaksi[3] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisreturn'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[3] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Accesoris
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vacc'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[4]++;
								}?>
								<?php if($indextransaksi[4] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vacc'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['nama'] ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[4] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="bg-success">
				<h4 class="pl-1 pb-2 pt-2">
					<a class="badge badge-primary dropdown-toggle" data-toggle="collapse" href="#collaprabu" role="button" aria-expanded="false" aria-controls="collaprabu">
						Rabu <?= $transaksi['allday'][3] ?>
					</a>
				</h4>
				<div class="collapse" id="collaprabu">
					<div class="card card-body bg-dark">

						<?php
						$nowdaytime = strtotime($transaksi['allday'][3]);
						$indextransaksi = [0, 0, 0, 0, 0]; ?>

						<div class="card">
							<div class="card-header bg-danger">
								HP MASUK
							</div>
							<div class="row card-body bg-primary">

								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpin'] as $value) :
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[0]++;
								endforeach;?>
								<?php if($indextransaksi[0] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpin'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>
										<?php endif;
									endforeach;?>
								<?php endif; ?>
								<?php if($indextransaksi[0] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								HP Terjual
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpout'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[1]++;
								}?>
								<?php if($indextransaksi[1] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpout'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : <?= $value['harga_awal'].'/'.$value['terjual']; ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach; 
								endif; ?>
								<?php if($indextransaksi[1] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Selesai
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisdone'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[2]++;
								}?>
								<?php if($indextransaksi[2] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisdone'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[2] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Return
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisreturn'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[3]++;
								}?>
								<?php if($indextransaksi[3] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisreturn'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[3] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Accesoris
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vacc'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[4]++;
								}?>
								<?php if($indextransaksi[4] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vacc'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['nama'] ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[4] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="bg-success">
				<h4 class="pl-1 pb-2 pt-2">
					<a class="badge badge-primary dropdown-toggle" data-toggle="collapse" href="#collapkamis" role="button" aria-expanded="false" aria-controls="collapkamis">
						Kamis <?= $transaksi['allday'][4] ?>
					</a>
				</h4>
				<div class="collapse" id="collapkamis">
					<div class="card card-body bg-dark">

						<?php
						$nowdaytime = strtotime($transaksi['allday'][4]);
						$indextransaksi = [0, 0, 0, 0, 0]; ?>

						<div class="card">
							<div class="card-header bg-danger">
								HP MASUK
							</div>
							<div class="row card-body bg-primary">

								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpin'] as $value) :
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[0]++;
								endforeach;?>
								<?php if($indextransaksi[0] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpin'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>
										<?php endif;
									endforeach;?>
								<?php endif; ?>
								<?php if($indextransaksi[0] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								HP Terjual
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpout'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[1]++;
								}?>
								<?php if($indextransaksi[1] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpout'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : <?= $value['harga_awal'].'/'.$value['terjual']; ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach; 
								endif; ?>
								<?php if($indextransaksi[1] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Selesai
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisdone'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[2]++;
								}?>
								<?php if($indextransaksi[2] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisdone'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[2] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Return
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisreturn'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[3]++;
								}?>
								<?php if($indextransaksi[3] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisreturn'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[3] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Accesoris
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vacc'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[4]++;
								}?>
								<?php if($indextransaksi[4] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vacc'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['nama'] ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[4] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="bg-success">
				<h4 class="pl-1 pb-2 pt-2">
					<a class="badge badge-primary dropdown-toggle" data-toggle="collapse" href="#collapjumat" role="button" aria-expanded="false" aria-controls="collapjumat">
						Jum'at <?= $transaksi['allday'][5] ?>
					</a>
				</h4>
				<div class="collapse" id="collapjumat">
					<div class="card card-body bg-dark">

						<?php
						$nowdaytime = strtotime($transaksi['allday'][5]);
						$indextransaksi = [0, 0, 0, 0, 0]; ?>

						<div class="card">
							<div class="card-header bg-danger">
								HP MASUK
							</div>
							<div class="row card-body bg-primary">

								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpin'] as $value) :
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[0]++;
								endforeach;?>
								<?php if($indextransaksi[0] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpin'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>
										<?php endif;
									endforeach;?>
								<?php endif; ?>
								<?php if($indextransaksi[0] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								HP Terjual
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpout'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[1]++;
								}?>
								<?php if($indextransaksi[1] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpout'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : <?= $value['harga_awal'].'/'.$value['terjual']; ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach; 
								endif; ?>
								<?php if($indextransaksi[1] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Selesai
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisdone'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[2]++;
								}?>
								<?php if($indextransaksi[2] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisdone'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[2] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Return
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisreturn'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[3]++;
								}?>
								<?php if($indextransaksi[3] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisreturn'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[3] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Accesoris
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vacc'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[4]++;
								}?>
								<?php if($indextransaksi[4] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vacc'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['nama'] ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[4] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="bg-success">
				<h4 class="pl-1 pb-2 pt-2">
					<a class="badge badge-primary dropdown-toggle" data-toggle="collapse" href="#collapsabtu" role="button" aria-expanded="false" aria-controls="collapsabtu">
						Sabtu <?= $transaksi['allday'][6] ?>
					</a>
				</h4>
				<div class="collapse" id="collapsabtu">
					<div class="card card-body bg-dark">

						<?php
						$nowdaytime = strtotime($transaksi['allday'][6]);
						$indextransaksi = [0, 0, 0, 0, 0]; ?>

						<div class="card">
							<div class="card-header bg-danger">
								HP MASUK
							</div>
							<div class="row card-body bg-primary">

								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpin'] as $value) :
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[0]++;
								endforeach;?>
								<?php if($indextransaksi[0] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpin'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>
											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hin',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>
										<?php endif;
									endforeach;?>
								<?php endif; ?>
								<?php if($indextransaksi[0] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								HP Terjual
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vhpout'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[1]++;
								}?>
								<?php if($indextransaksi[1] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vhpout'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">ram/rom/jaringan : <?= $value['ram'].'/'.$value['rom'].'/'.$value['jaringan'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">garansi : <?= $value['garansi'] ?></p>
													<p class="card-text mb-0 pb-0 mt-0">harga awal/terjual : <?= $value['harga_awal'].'/'.$value['terjual']; ?></p>
													<p class="card-text mb-0 pb-0 mt-0">kelengkapan : <?= $value['kelengkapan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">sales : <?= $value['sales']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('hout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach; 
								endif; ?>
								<?php if($indextransaksi[1] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Selesai
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisdone'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[2]++;
								}?>
								<?php if($indextransaksi[2] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisdone'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servout',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[2] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Servis Return
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vservisreturn'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[3]++;
								}?>
								<?php if($indextransaksi[3] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vservisreturn'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['merk'].' '.$value['tipe'].'('.$value['imei'].')' ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">kerusakan : <?= $value['kerusakan']?></p>
													<p class="card-text mb-0 pb-0 mt-0">biaya : <?= $value['biaya']?></p>
													<p class="card-text mb-0 pb-0 mt-0">teknisi : <?= $value['teknisi']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('servreturn',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[3] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

						<div class="card">
							<div class="card-header bg-danger">
								Accesoris
							</div>
							<div class="row card-body bg-primary">
								<?php 
								$count = 0;
								foreach ($transaksi['weeknow']['vacc'] as $value) {
									$valuetanggal = strtotime($value['tanggal']);
									if($nowdaytime == $valuetanggal) $indextransaksi[4]++;
								}?>
								<?php if($indextransaksi[4] > 0) : ?>
									<?php foreach ($transaksi['weeknow']['vacc'] as $value) :
										$valuetanggal = strtotime($value['tanggal']);
										if($nowdaytime == $valuetanggal) : $count++;?>

											<div class="card col-md-4 text-dark">
												<div class="card-body">
													<h5 class="card-title text-center"><?= $count ?></h5>
													<h5 class="card-title"><?= $value['nama'] ?></h5>
													<p class="card-text mb-0 pb-0 mt-0">harga : <?= $value['harga']?></p>
													<p class="card-text mb-0 pb-0 mt-0">catatan : <?= $value['catatan']?></p>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>, false)" class="badge badge-primary" data-toggle="modal" data-target="#inputmodal">edit</a>
													<a href="#" onclick="editorremoveitem('acc',<?= $value['id'] ?>)" class="badge badge-danger">hapus</a>
												</div>
											</div>

										<?php endif;
									endforeach;
								endif; ?>
								<?php if($indextransaksi[4] == 0) : ?>
									<p>Tidak Ada Data</p>
								<?php endif; ?>

							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
