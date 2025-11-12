<?php
function curl_($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Ambil data JSON dari file json.php
$send = curl_("http://localhost/rekayasaweb/Tugas%202/index.php");

// Decode JSON jadi array
$data = json_decode($send, TRUE);

// Tampilkan dalam bentuk tabel HTML
echo "<table border='1' cellspacing='0' cellpadding='8'>";
echo "<tr style='background-color: #f2f2f2;'>
        <th>KOTA</th>
        <th>LANDMARK</th>
        <th>TARIF</th>
      </tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row["kota"] . "</td>";
    echo "<td>" . $row["landmark"] . "</td>";
    echo "<td>" . $row["tarif"] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>