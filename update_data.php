<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonString = file_get_contents('data.json');

    $data = json_decode($jsonString, true);

    // Menentukan ID baru berdasarkan nomor data terakhir
    $lastNo = count($data) > 0 ? $data[count($data) - 1]['no'] : 0;
    $newNo = $lastNo + 1;

    // Mengambil data dari formulir HTML
    $newSso = $_POST['sso'];
    $newNama = $_POST['nama'];
    $newNim = $_POST['nim'];
    $newJenisLayanan = $_POST['jenis_layanan'];

    // Menambahkan data baru ke dalam array JSON
    $data[] = array(
        'no' => $newNo,
        'sso' => $newSso,
        'nama' => $newNama,
        'nim' => $newNim,
        'jenis layanan' => $newJenisLayanan
    );

    // Mengubah array JSON menjadi string JSON
    $updatedJsonString = json_encode($data, JSON_PRETTY_PRINT);

    // Menyimpan string JSON kembali ke dalam file JSON
    file_put_contents('data.json', $updatedJsonString);

    // Mengarahkan kembali ke halaman indeks setelah menambahkan data
    header('Location: index.php');
    exit();
}
?>
