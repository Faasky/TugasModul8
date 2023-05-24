<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi Kasir Penjualan Rokok</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Aplikasi Kasir Penjualan Rokok</h1>
    <form action="hasil.php" method="POST">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
      </div>

      <div class="menu-container">
        <div class="daftar-menu">
          <label>Pilih Rokok:</label>
          <?php
          $daftar_menu = array(
            'Djarum Super',
            'Camel Purple',
            'Esse Change',
            'Marlboro Red'
          );

          foreach ($daftar_menu as $menu) {
            echo '<div class="checkbox-item">';
            echo '<input type="checkbox" name="merk[]" value="' . $menu . '">';
            echo '<label>' . $menu . '</label>';
            echo '</div>';
          }
          ?>
        </div>

        <div class="jumlah-pembelian">
          <label>Jumlah:</label>
          <?php
          foreach ($daftar_menu as $index => $menu) {
            echo '<div class="textbox">';
            echo '<input type="number" name="jumlah[]" min="0" value="0">';
            echo '<input type="hidden" name="menu[]" value="' . $menu . '">';
            echo '</div>';
          }
          ?>
        </div>
      </div>

      <div class="btn-group">
        <a href="daftar_harga.php" class="btn-harga">Daftar Harga</a>
        <button type="submit" class="btn-submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
