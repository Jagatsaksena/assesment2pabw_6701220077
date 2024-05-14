<?php
if (isset($_POST['sso'], $_POST['nama'], $_POST['nim'], $_POST['jenis_layanan'])) {
    $jsonData = file_get_contents('data.json');

    $dataArray = json_decode($jsonData, true);

    // Hitung jumlah entri yang ada dalam data JSON
    $entryCount = count($dataArray);

    $newEntry = array(
        'no' => $entryCount + 1, // Gunakan jumlah entri ditambah 1 sebagai nomor entri baru
        'sso' => $_POST['sso'],
        'nama' => $_POST['nama'],
        'nim' => $_POST['nim'],
        'jenis layanan' => $_POST['jenis_layanan']
    );

    $dataArray[] = $newEntry;

    $updatedJsonData = json_encode($dataArray, JSON_PRETTY_PRINT);

    file_put_contents('data.json', $updatedJsonData);

    echo "Data berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan data. Form tidak lengkap.";
}
?>
