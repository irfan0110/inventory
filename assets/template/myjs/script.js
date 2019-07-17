// Data table User
$(function () {
	$('#tableUser').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': false,
		'autoWidth': true
	})
})

// Data table Supplier
$(function () {
	$('#tableSupplier').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': false,
		'autoWidth': true
	})
})

// Data table Data Barang
$(function () {
	$('#tableDataBarang').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': false,
		'autoWidth': true
	})
})

// Data table Stock Barang
$(function () {
	$('#tableStockBarang').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': false,
		'autoWidth': true
	})
})

// Data table Barnag masuk

$(function () {
	$('#tableBarangMasuk').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': true,
		'autoWidth': true
	})
})


// Data table Pilih data

$(document).ready(function () {
	$('#tablePilihData').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': false,
		'autoWidth': true
	})
})

// Data table Mapping

$(function () {
	$('#tableDataMapping').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': true,
		'autoWidth': true
	})
})



$(document).ready(function () {
	$('#tableBarangKeluar').DataTable({
		'paging': true,
		'lengthChange': false,
		'searching': true,
		'ordering': false,
		'info': true,
		'scrollX': true,

	})
})
// autocomplete barang masuk

function autofill() {
	var kode_barang = $("#kode_barang").val();
	$.ajax({
		url: 'get_autocomplete',
		dataType: 'json',
		data: 'kode_barang=' + kode_barang
	}).done(function (data) {
		var json = data,
			obj = json;
		$("#nama_barang").val(obj[0].nama_barang);
		$("#jenis_barang").val(obj[0].jenis_barang);
	});
}

//date picker lap barang masuk

$(document).ready(function () {
	$("#awal_masuk").datepicker({
		format: 'yyyy-mm-dd',
		changeMonth: true,
		changeYear: true,
		autoclose: true,
	});
});
$(document).ready(function () {
	$("#sampai_masuk").datepicker({
		format: 'yyyy-mm-dd',
		changeMonth: true,
		changeYear: true,
		autoclose: true,
	});
});

//date picker lap barang keluar

$(function () {
	$("#awal_keluar").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		autoclose: true,
	});
});
$(function () {
	$("#sampai_keluar").datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		autoclose: true,
	});
});
