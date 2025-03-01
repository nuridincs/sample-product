<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sample Product</title>
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
		<!-- <link href="<?php //echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet"> -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/parkir.png'); ?>" />

		<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker3.css'); ?>"/>
	</head>
	<body>
	<nav class="navbar navbar-default nav-t navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if($this->session->userdata('levelaks') == 3){ ?>

			<?php }else{ ?>
				<a class="navbar-brand" href="<?php echo base_url('main/home'); ?>">Home</a>
				<a class="navbar-brand" href="<?php echo base_url('main/masterProduct'); ?>">Master Produk</a>
				<a class="navbar-brand" href="<?php echo base_url('main/sampleProduct'); ?>">Daftar Sampel</a>
				<a class="navbar-brand" href="<?php echo base_url('main/scanBarcode'); ?>">Scan Barcode</a>
				<a class="navbar-brand" href="<?php echo base_url('main/productExpired'); ?>">Product Expired</a>
				<a class="navbar-brand" href="<?php echo base_url('main/kelolaUser'); ?>">Kelola User</a>
				<a class="navbar-brand" href="<?php echo base_url('main/report'); ?>">Laporan</a>
			<?php } ?>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="menu-t">
					<a href="<?php echo base_url(); ?>login/logoutProcess">
						<span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('nama') ?>
						&nbsp;
						&nbsp;
						&nbsp;
						KELUAR
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<div style="margin-bottom: 60px;"></div>
	<div class="container">
		<?php $this->load->view($content); ?>
	</div>

		<!-- external javascript -->
		<script src="<?php echo base_url('assets/js/jquery.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/main.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>

		<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
		<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>

		<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>
	</body>
</html>

 <script>
 	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var date_input_2 =$('input[name="date_2"]'); //our date input has the name "date"
		var expired_date =$('input[name="expired_date"]');
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',//yyyy-mm-dd
			container: container,
			todayHighlight: true,
			autoclose: true,
		})

		date_input_2.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})

		expired_date.datepicker({
				format: 'yyyy-mm-dd',
				container: container,
				todayHighlight: true,
				autoclose: true,
				daysOfWeekDisabled: '0,6',
				todayHighlight: true,
				orientation: 'bottom'
				// disableTouchKeyboard: true,
				// inputs: $('input[name="date-range-start-date"],input[name="date-range-end-date"]').toArray(),
        // container: '#date-range-picker-container'
			})
	})
</script>