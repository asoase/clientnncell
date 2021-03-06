<div class="modal-header">
	<h5 class="modal-title"><?= $namatransaksi; ?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<h5 class="modal-title text-center mb-2"><?= $detailitem['merk'].' '.$detailitem['tipe'].' ('.$detailitem['imei'].')';?></h5>
	<div class="table-responsive">
		<table class="table table-sm table-bordered table-striped">
			<tbody>
				<tr>
					<th scope="row" class="align-baseline">Tanggal</th>
					<td class="align-baseline"><?= $detailitem['tanggal']; ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">RAM/ROM</th>
					<td><?= $detailitem['ram'].'/'.$detailitem['rom']; ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Jaringan</th>
					<td><?= $detailitem['jaringan']; ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Garansi</th>
					<td><?= $detailitem['garansi']; ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Harga Awal</th>
					<td><?= 'Rp. '.number_format($detailitem['harga_awal'],2,',','.'); ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Terjual</th>
					<td><?= 'Rp. '.number_format($detailitem['terjual'],2,',','.'); ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Kelengkapan</th>
					<td><?= $detailitem['kelengkapan']; ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Kerusakan</th>
					<td><?= $detailitem['kerusakan']; ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Sales</th>
					<td><?= $detailitem['sales']; ?></td>
				</tr>
				<tr>
					<th scope="row" class="align-baseline">Catatan</th>
					<td><?= $detailitem['catatan']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="modal-footer">
	<!-- <button type="button" class="btn btn-sm btn-secondary py-0 rounded" data-dismiss="modal">Close</button> -->
	<button type="button" class="btn btn-sm btn-success py-0 rounded edititem" data-tipetransaksi='<?= $tipetransaksi; ?>' data-iditem='<?= $iditem; ?>'>Edit</button>
	<button type="button" class="btn btn-sm btn-danger py-0 rounded hapusitem" data-tipetransaksi='<?= $tipetransaksi; ?>' data-iditem='<?= $iditem; ?>'>Hapus</button>
</div>