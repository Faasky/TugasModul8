<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi Kasir Penjualan Rokok - Hasil Penjualan</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Hasil Penjualan</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['nama']) && isset($_POST['merk']) && isset($_POST['jumlah'])) {
        $nama = $_POST['nama'];
        $merk = $_POST['merk'];
        $jumlah = $_POST['jumlah'];

        if (!empty($nama) && !empty($merk) && !empty($jumlah)) {
          echo '<div class="textbox">';
          echo '<label for="nama">Nama:</label>';
          echo '<input type="text" id="nama" value="' . $nama . '" readonly>';

          echo '<table>';
          echo '<tr><th>No.</th><th>Merk</th><th>Jumlah</th></tr>';

          $selected_merk_count = count($merk); // Menghitung jumlah merk yang dicentang
          $total_jumlah = 0; // Inisialisasi total jumlah rokok

          for ($i = 0; $i < $selected_merk_count; $i++) {
            if (!empty($merk[$i])) { // Hanya jika merk rokok dicentang
              $item_no = $i + 1;
              echo '<tr>';
              echo '<td>' . $item_no . '</td>';
              echo '<td>' . $merk[$i] . '</td>';
              echo '<td>' . $jumlah[$i] . '</td>';
              echo '</tr>';

              $total_jumlah += $jumlah[$i]; // Menambahkan jumlah rokok ke total
            }
          }
          echo '</table>';

          echo '<label for="jumlah">Jumlah:</label>';
          echo '<input type="text" id="jumlah" value="' . $total_jumlah . '" readonly>';
          echo '</div>';

          echo '<table>';
          echo '<tr><th>No.</th><th>Merk</th><th>Harga</th><th>Subtotal</th></tr>';

          $daftar_harga = array(
            'Djarum Super' => 25000,
            'Camel Purple' => 16000,
            'Esse Change' => 31000,
            'Marlboro Red' => 50000
          );

          $total_harga = 0;

          foreach ($merk as $index => $selected_merk) {
            if (isset($daftar_harga[$selected_merk])) {
              if (!empty($merk[$index])) { // Hanya jika merk rokok dicentang
                $harga_per_bungkus = $daftar_harga[$selected_merk];
                $subtotal_harga = $harga_per_bungkus * $jumlah[$index];

                $item_no = $index + 1;
                echo '<tr>';
                echo '<td>' . $item_no . '</td>';
                echo '<td>' . $selected_merk . '</td>';
                echo '<td>' . $harga_per_bungkus . '</td>';
                echo '<td>' . $subtotal_harga . '</td>';
                echo '</tr>';

                $total_harga += $subtotal_harga;
              }
            }
          }

          echo '</table>';

          echo '<div class="total">Total Rp: ' . $total_harga . '</div>';
        } else {
          echo '<p>Form tidak lengkap atau data tidak valid. Silakan coba lagi.</p>';
        }
      } else {
        echo '<p>Form tidak lengkap. Silakan coba lagi</p>';
      }
    }
    ?>

    <a href="index.php" class="btn-kembali">Kembali</a>
  </div>
</body>
</html>
