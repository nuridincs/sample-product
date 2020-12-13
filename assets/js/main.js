$(document).ready(function(){
  $('#form-expired').hide();
  $("#check-product").click(() => {
    const getBarcode = $("#barcodeDocumentID").val();
    // return false;
    // // const qrcode = $("#qrcode").val(); // qrcode
    // const getBarcode = document.getElementById("scanned-QR").textContent; // barcode
    const barcodeSplit = getBarcode.split(" ");
    const barcode = barcodeSplit[0];
    const id = barcodeSplit[1];


    if (getBarcode === "") {
      alert("Silahkan Scan Barcode");
      return false;
    }

    $("#barcodeNumber").val(barcode);
    $("#idProduct").val(id);

    $.ajax({
      url:'execute/get/checkProduct',
      type:'post',
      data: {id,barcode},
      success:function(data){
        $('.p_result').html(data);
        $('#form-expired').show();
        setTimeout(() => {
          $('.p_result').html('');
          $('#form-expired').hide();
        },100000);
      }
    });
  });

  $('#insert-expired-date').click(() => {
    const id = $("#idProduct").val();
    const barcode = $("#barcodeNumber").val();
    const expiredDate = $("#expiredDate").val();
    const kodeProducts = $("#kodeProducts").val();

    if (expiredDate === "") {
      alert("Tanggal Expired harus diisi!");
      return false;
    }

    $.ajax({
      url:'execute/add/sampleProduct',
      type:'post',
      data: { id, barcode, kodeProducts, expiredDate },
      success:function() {
        alert('Berhasil menambahkan data');
        window.location.reload();
      }
    });
  });

  $('#printBarcode').click(() => {
    window.print();
    console.log('print');
  });

  $("#clearBarcode").click(() => {
    window.location.reload();
  })
});