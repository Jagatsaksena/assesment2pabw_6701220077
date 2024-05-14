<?php
if (isset($_GET['id'])) {
    $idToDelete = $_GET['id'];

    $jsonString = file_get_contents('data.json');

    $proyek = json_decode($jsonString, true);

    foreach ($proyek as $key => $project) {
        if ($project['no'] == $idToDelete) { // Menggunakan kunci 'no' untuk pencocokan
            unset($proyek[$key]);
            break;
        }
    }

    $updatedJsonString = json_encode(array_values($proyek), JSON_PRETTY_PRINT); // Membuat ulang array dengan kunci yang disusun ulang

    file_put_contents('data.json', $updatedJsonString);

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
