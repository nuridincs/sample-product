<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WebCodeCamJS</title>
        <!-- <link href="<?php //echo base_url(); ?>assets/lib/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="<?= base_url(); ?>assets/lib/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container" id="QR-Code">
            <!-- <form action="" onsubmit="readBarcode()" method="post"> -->
            <!-- <input type="text" id="barcodeDocumentID" name="documentID" onmouseover="this.focus();" /> -->
            <!-- </form> -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="navbar-form navbar-left">
                        <h4>Scan Barcode</h4>
                    </div>
                    <!-- <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                            <input id="image-url" type="text" class="form-control" placeholder="Image url">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                         </div>
                    </div> -->
                </div>
                <div class="container" style="margin-top: 3rem;">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" id="barcodeDocumentID" placeholder="Arahkan pointer kesini kemudian mulai scan" class="form-control" name="documentID" onmouseover="this.focus();" />
                        </div>
                        <div class="col-md-2">
                            <div class="btn btn-danger" id="clearBarcode">Refresh Barcode</div>
                        </div>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <div class="col-md-6">
                        <!-- <div class="well" style="position: relative;display: inline-block;">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div> -->
                        <div class="well" style="width: 100%;">
		                    <div class="form-group">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" id="check-product">Cek Produk</button>
                                </div>

                                <div id="form-expired">
                                    <div class="form-group">
                                        <label>Masukan Tanggal Expired</label>&nbsp;<span class="error" id="expired_date"></span>
                                        <input type="text" name="expired_date" id="expiredDate" class="form-control" required>
                                        <br>
                                        <button class="btn btn-danger btn-block" id="insert-expired-date">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail" id="result">
                            <!-- <div class="well" style="overflow: hidden;">
                                <img width="320" height="240" id="scanned-img" src="">
                            </div>
                            <div class="caption">
                                <h3>Scanned result</h3>
                                <p id="scanned-QR"></p>
                                <input type="hidden" id="qrcode" readonly class="form-control">
                                <input type="hidden" id="barcodeNumber" readonly class="form-control">
                                <input type="hidden" id="idProduct" readonly class="form-control">
                            </div> -->
                            <div class="p_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?= base_url(); ?>assets/lib/js/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--
            <script type="text/javascript" src="<?//= base_url(); ?>assets/lib/js/jquery.js"></script>
            <script type="text/javascript" src="<?//= base_url(); ?>assets/lib/js/qrcodelib.js"></script>
            <script type="text/javascript" src="<?//= base_url(); ?>assets/lib/js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="<?//= base_url(); ?>assets/lib/js/mainjquery.js"></script>
        -->
        <!-- <script type="text/javascript" src="<?= base_url(); ?>assets/lib/js/qrcodelib.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/lib/js/webcodecamjs.js"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/lib/js/main.js"></script> -->
    </body>
</html>