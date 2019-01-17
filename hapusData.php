<?php
include 'navbar.php';
require_once "database.php";
global $conn;

$query  = "SELECT * FROM product";
$result = $conn->query($query); ?>



<form>
  <div class="row">
    <!-- Product Name -->
    <div class="col">
      <button type="submit" class="btn btn-primary main-title" disabled>Nama Barang</button>
    </div>
    <!-- Product Price -->
    <div class="col">
      <button type="submit" class="btn btn-primary main-title" disabled>Harga Barang</button>
    </div>
    <!-- Product Qty -->
    <div class="col">
      <button type="submit" class="btn btn-primary main-title" disabled>Hapus</button>
    </div>

  </div>
</form>






</section>
<?php
if($result->num_rows > 0){
  $i = 0;
   while($row = $result->fetch_assoc()) {
?>

<section id="productList">
  <form action="deleteFunction.php?id=<?=$row['productId']; ?>" method="POST">
    <div class="row">
      <!-- Product Name -->
      <div class="col">
        <input type="text" readonly class="form-control" value="<?= $row['productName'] ?>">
      </div>
      <!-- Product Price -->
      <div class="col">
        <input id="productPrice<?= $i+1; ?>" type="text" readonly class="form-control" value="<?= $row['productPrice'] ?>">
      </div>
      <!-- Delete Button -->
      <div class="col">
        <button type="submit" class="btn btn-danger delete-button">Hapus</button>
      </div>

    </div>
  </form>
</section>








<?php
  } }
?>


<?php include 'footer.php'; ?>
