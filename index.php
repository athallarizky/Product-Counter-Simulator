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
      <button type="submit" class="btn btn-primary main-title" disabled>Quantity</button>
    </div>
    <!-- Total Price -->
    <div class="col">
      <button type="submit" class="btn btn-primary main-title" disabled>Total</button>
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
  <form>
    <div class="row">
      <!-- Product Name -->
      <div class="col">
        <input type="text" readonly class="form-control" value="<?= $row['productName'] ?>">
      </div>
      <!-- Product Price -->
      <div class="col">
        <input id="productPrice<?= $i+1; ?>" type="text" readonly class="form-control" value="<?= $row['productPrice'] ?>">
      </div>
      <!-- Product Qty -->
      <div class="col">
        <input id="productQty<?= $i+=1; ?>" type="number" class="form-control" onkeyup="multiplication();">
      </div>
      <!-- Total Price -->
      <div class="col">
        <input id="totalPrice<?=$i-0; ?>" type="text" class="form-control total-price"  name="qty" readonly>
      </div>

    </div>
  </form>
</section>








<?php
  } }
?>

<div class="row countReset">
   <div class="col-md-3 ml-auto">
     <button type="button" class="btn alert alert-success countResetButton" onclick="findTotal();">Hitung</button>
     <button type="button" class="btn alert alert-danger countResetButton" onclick="resetTotal();">Reset</button>
   </div>
</div>

<div class="row">
  <div class="col-md-8 total-price"><h5>Harga Total</h5></div>
  <div class="col-md-4"><input id="total" type="text" class="form-control" value="" readonly></div>
</div>

<script>
function multiplication() {
  for (var x = 1; x < 100; x++) {
    var priceValue = document.getElementById("productPrice"+x).value;
    var qtyValue = document.getElementById("productQty"+x).value;

    var result = parseInt(priceValue) * parseInt(qtyValue);
        if (!isNaN(result)) {
           document.getElementById('totalPrice'+x).value = result;
        }else{
           document.getElementById('totalPrice'+x).value='';
        }
  }
}


  function findTotal(){
      var arr = document.getElementsByName('qty');
      var tot=0;
      for(var i=0;i<arr.length;i++){
          if(parseInt(arr[i].value))
              tot += parseInt(arr[i].value);
      }
      var total = document.getElementById('total').value = tot;
        if (isNaN(total)) {
           document.getElementById('total').value = '';
        }
  }

  function resetTotal(){
    var reset = document.getElementById('total').value;

    if(!isNaN(reset)) {
      document.getElementById('total').value = '';
        for (var x = 1; x < 100; x++) {
          var g = document.getElementById("productQty"+x).value;
            if(!isNaN(g)) {
              document.getElementById("productQty"+x).value='';
              document.getElementById("totalPrice"+x).value=''
            }
        }
    }
  }

</script>




<?php include 'footer.php'; ?>
