<?php include 'navbar.php'; ?>

  <section id="tambahData">
    <form action="" method="POST">
      <div class="form-group">
        <label for="TambahData">Tambah Data Barang</label>
        <input type="text" class="form-control" placeholder="Masukan Nama Barang" name="productName">
      </div>
      <div class="form-group">
        <label for="TambahData">Tambah Harga Barang</label>
        <input type="text" class="form-control" placeholder="Masukan Harga Barang" name="productPrice">
        <small id="emailHelp" class="form-text text-muted">Contoh penulisan harga: 1000 (Seribu Rupiah)</small>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Masukan Data</button>
    </form>
  </section>

  <?php
    require_once "database.php";
    global $conn;

    if(isset($_POST['submit'])){
      $productName  = $_POST['productName'];
      $productPrice = $_POST['productPrice'];

      if(!empty($productName) && !empty($productPrice)){

        $query  = "INSERT INTO product(productName,productPrice) VALUES('$productName','$productPrice')";
        $result = $conn->query($query);

        if ($result) { ?>
          <!-- Form data berhasil masuk -->
          <div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!
          </div>

        <?php
        }else{ ?>
          <!-- Form data gagal masuk -->
          <div class="alert alert-danger" role="alert">
            Data Gagal Ditambahkan!
          </div>
        <?php
        }
      }else{
        ?>
        <div class="alert alert-primary" role="alert">
          Data Tidak Boleh Kosong!
        </div>
        <?php
      }

    }

 include 'footer.php'; ?>
