<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/1f3a35a986.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?= $CSSPATH; ?>">
	<title><?= $title; ?></title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-dark rounded-bottom shadow">
		<div class="container">
			<a class="navbar-brand mr-auto" href="<?= base_url('beranda'); ?>">
				<img src="<?= $IMGPATH.'n.jpg'; ?>" alt="" width="30" height="30">
				NOERICELL
			</a>
			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto headeraktif" data-headeraktif=<?= '"'.$headeraktif.'"'; ?>>
					<li class="nav-item border-bottom">
						<a class="nav-link" href="<?= base_url('beranda'); ?>">Beranda <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item border-bottom ml-1">
						<a class="nav-link" href="<?= base_url('servis'); ?>">Servis</a>
					</li>
					<li class="nav-item border-bottom ml-1">
						<a class="nav-link" href="<?= base_url('admin'); ?>">Admin</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>