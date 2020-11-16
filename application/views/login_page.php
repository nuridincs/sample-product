<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Aplikasi Sampel Produk</title>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/parkir.png'); ?>" />
	</head>
	<body class="body">
		<div class="container">
			<div class="col-sm-12 col-md-4 login-box-t col-md-offset-4">

				<div align="center" style="color:#fff"><h3>Aplikasi Sampel Produk</h3></div>
				<br>
				<form action="<?php echo site_url('login/loginProcess'); ?>" method="post">
					<div class="form-group has-feedback">
						<div style="color:#F2F2F2;padding-bottom:10px;font-size:9pt;padding-left:12px;">NAMA</div>
						<input type="text" name="email" class="form-log" maxlength="100" required>
					</div>
					<div class="form-group has-feedback">
						<div style="color:#F2F2F2;padding-bottom:10px;font-size:9pt;padding-left:12px;">KATA SANDI</div>
						<input type="password" name="password" class="form-log" maxlength="100" required>
					</div>
					<br/>
					<button type="submit" class="btn2 btn-success" style="width:100%;">Masuk</button><br/>
				</form>
				<br>
				<div style="color:#fff">
					<div>
						Akses Admin<br>
						user : admin@gmail.com<br>
						Pass : 123<br>
					</div>
				</div>
			</div>
		</div>

		<!-- external javascript -->
		<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/js/jquery.js" type="text/javascript"></script>
	</body>
</html>