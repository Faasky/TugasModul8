<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi Kasir Penjualan Rokok - Daftar Harga</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Daftar Harga Rokok</h1>

    <table>
      <tr>
        <th>No.</th>
        <th>Merk Rokok</th>
        <th>Harga per Bungkus</th>
      </tr>
      <?php
      $daftar_harga = array(
        'Djarum Super' => 25000,
        'Camel Purple' => 16000,
        'Esse Change' => 31000,
        'Marlboro Red' => 50000
      );

      $nomor_urutan = 1;
      foreach ($daftar_harga as $index => $harga) {
        echo '<tr>';
        echo '<td>' . $nomor_urutan . '</td>';
        echo '<td>' . $index . '</td>';
        echo '<td>' . $harga . '</td>';
        echo '</tr>';
        $nomor_urutan++;
      }

      ?>
    </table>

    <a href="index.php" class="btn-kembali">Kembali</a>
  </div>
</body>
</html>
