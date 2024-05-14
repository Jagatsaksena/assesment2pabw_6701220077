<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran online</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h1>Data Pendaftar Layanan Kesehatan</h1>
    <a href="#" id="tambahDataLink">Tambah Data</a>

    <div id="tambahDataForm" style="display: none;">
        <form id="kategoriForm">
            <label for="sso">Email SSO:</label>
            <input type="text" id="sso" name="sso" required><br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required><br>

            <label for="jenis_layanan">Jenis Layanan:</label>
            <input type="text" id="jenis_layanan" name="jenis_layanan" required><br>

            <button type="submit">Tambah</button>
        </form>
    </div>

    <table border="1" cellspacing="0" id="kategoriTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Email SSO</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jenis Layanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            function fetchAndDisplayKategori() {
                $.getJSON("data.json", function(data) {
                    $("#kategoriTable tbody").empty();

                    $.each(data, function(index, asprak) {
                        var newRow = $("<tr>");
                        newRow.append("<td>" + asprak.no + "</td>");
                        newRow.append("<td>" + asprak.sso + "</td>");
                        newRow.append("<td>" + asprak.nama + "</td>");
                        newRow.append("<td>" + asprak.nim + "</td>");
                        newRow.append("<td>" + asprak['jenis layanan'] + "</td>");
                        newRow.append("<td><a href='hapus_data.php?id=" + asprak.no + "'>Hapus</a></td>");
                        $("#kategoriTable tbody").append(newRow);
                    });
                });
            }

            fetchAndDisplayKategori();

            $("#tambahDataLink").click(function() {
                $("#tambahDataForm").toggle();
            });

            $("#kategoriForm").submit(function(event) {
                event.preventDefault();
                var sso = $("#sso").val();
                var nama = $("#nama").val();
                var nim = $("#nim").val();
                var jenis_layanan = $("#jenis_layanan").val();

                $.ajax({
                    url: "input.php",
                    method: "POST",
                    data: {
                        sso: sso,
                        nama: nama,
                        nim: nim,
                        jenis_layanan: jenis_layanan
                    },
                    success: function(response) {
                        fetchAndDisplayKategori();
                        $("#tambahDataForm").hide();
                    }
                });
            });
        });
    </script>
</body>

</html>
