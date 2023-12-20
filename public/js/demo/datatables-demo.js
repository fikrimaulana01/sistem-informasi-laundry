// Call the dataTables jQuery plugin
$(document).ready(function () {
    // Inisialisasi DataTable
    var dataTable = $("#dataTable").DataTable();

    // Menambahkan event listener untuk input pencarian
    $("#cari").on("keyup", function () {
        // Mendapatkan nilai dari input pencarian
        var keyword = $(this).val().toLowerCase();

        // Menggunakan metode columns().search() untuk mencari hanya pada kolom ke-3
        dataTable.columns(1).search(keyword).draw();
    });
});
