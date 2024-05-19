<?php
// Start session
session_start();

// Check if user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    // Include database connection
    require "../includes/dbh.php";

    // If 'edit' action is requested (marking product as sold)
    if (isset($_GET['edit']) && isset($_GET['prod_id'])) {
        // Get product ID from URL parameter
        $prodid = $_GET['prod_id'];

        // Retrieve product details from database
        $query = "SELECT * FROM productss WHERE id = $prodid";
        $view_prods = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($view_prods)) {
            $id = $row['id'];
            $pname = $row['prod_name'];
            $pretprice = $row['prod_retail'];
            $pstck = $row['prod_stock'];
        }

        // Processing form data when form is submitted
        if (isset($_POST['update'])) {
            $pname = $_POST['pname-inpt'];
            $pretprice = $_POST['pretprice-inpt'];
            $pstck = $_POST['pstck-inpt'];

            $solds = $_POST['sold'];
            $trans = $_POST['dateoftrans'];
            $tot = $_POST['total'];

            // Update product details in database
            $query = "UPDATE productss SET prod_name = '{$pname}', prod_retail = '{$pretprice}', prod_stock = '{$pstck}' WHERE id = $prodid";
            $update_prod = mysqli_query($conn, $query);

            // Insert transaction record into 'trans' table
            $squery = "INSERT INTO trans (prod_name, coutof_sold, date_sold, total) VALUES ('$pname','$solds','$trans','$tot')";
            $insert_trans = mysqli_query($conn, $squery);

            // Redirect with success message
            header("Location: ../mainpg.php?update=success");
            exit();
        }
    }

// If 'remove' action is requested (deleting product)
if (isset($_GET['remove']) && isset($_GET['prod_id'])) {
  // Get product ID from URL parameter
  $prod_id = $_GET['prod_id'];

  // Retrieve product details before removing it
  $query_select = "SELECT * FROM productss WHERE id = $prod_id";
  $result_select = mysqli_query($conn, $query_select);
  $row = mysqli_fetch_assoc($result_select);

  // Insert removed item into 'temporary_removed' database
  $insert_query = "INSERT INTO temporary_removed (id, prod_name, prod_whlsale, prod_retail, prod_qnt, prod_stock) VALUES ('{$row['id']}', '{$row['prod_name']}', '{$row['prod_whlsale']}', '{$row['prod_retail']}', '{$row['prod_qnt']}', '{$row['prod_stock']}')";
  $insert_result = mysqli_query($conn, $insert_query);

  // Delete product from database
  $query_delete = "DELETE FROM productss WHERE id = $prod_id";
  $result = mysqli_query($conn, $query_delete);

  // Redirect with appropriate message
  if ($result) {
      header("Location: ../mainpg.php?remove=success");
      exit();
  } else {
      header("Location: ../mainpg.php?remove=error");
      exit();
  }
}

} else {
    // Redirect to login page if user is not logged in
    header("Location: index.php");
    exit();
}
?>
<head>
  <title>Sold Product</title>
  <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
   body{
		background: #f1f1f1;
	}
  .main-container {
    background: #caebf2;
        height: 700px;
        width: 550px;
		border-radius: 14px;
		position: relative;
    top: 70px;
	}
  .main-container h1{
    padding-top: 10px;
    font-family: 'Public Sans', sans-serif;
    font-size: 50px;
    color: #2b6777;
  }
  input[name="pname-inpt"]::placeholder {        
		text-align: center;
	}input[name="pretprice-inpt"]::placeholder {        
		text-align: center;
	}input[name="pstck-inpt"]::placeholder {        
		text-align: center;
	}input[name="total"]::placeholder {        
		text-align: center;
	}
  input[name="opr-sub"]{
    margin-top: 121px;
  }
	input {
	  height: 50px;
    width: 70%;
    font-size: 19px;
		border: none;
		text-align: center;
		font-family: 'Public Sans', sans-serif;
    margin-top: 10px;
    outline: none;

	}
  input[name="update"]{
		height: 60px;
		width: 50%;
		position: relative;
		top: 7px;
		border: none;
		background: #ff3b3f;
		color: #ffffff;
		font-size: 25px;
		font-family: 'Public Sans', sans-serif;
	}
  img[name="back-btn"]{
    position: absolute;
    height: 50px;
    top: -55px;
    right: 1px;
}
  label {
    font-size: 20px;
    font-family: 'Public Sans', sans-serif;
    color: #a9a9a9;
    

  }

</style>
<script>
    $(document).ready(function() {
          const def = $("#stock").val()
          $("#sold,#stock").keyup(function() {
              var total = 0;
              var x = Number($("#sold").val());
              var total = def - x;
              $("#stock").val(total); // the result will be showed in "quantity"
          });
          
          $("#sold,#pretprice-inpt").keyup(function() {
              var totalq = 0;
              var a = Number($("#sold").val());
              var b = Number($("#pretprice-inpt").val());
              var totalq = a * b;
              $("#total").val(totalq); 
          });
    });
</script>
<center>
  <div class="main-container">
    <a href="../mainpg.php"><img name="back-btn" src="../img/icons/close-btn.png" alt="Back"></a>
  <h1 class="text-center">Sold Product</h1>
    <form action="" method="post">
        <label for="pname-inpt">Product Name</label><br>
        <input type="text" name="pname-inpt"  value="<?php echo $pname  ?>" readonly><br>
        <label for="pretprice-inpt">Retail Price</label><br>
        <input type="number" name="pretprice-inpt" id="pretprice-inpt" step="any" value="<?php echo $pretprice  ?>" readonly><br>
        <label for="pstck-inpt">Stock Available</label><br>
        <input type="number" name="pstck-inpt" id="stock" value="<?php echo $pstck  ?>" readonly><br>
        <label for="dateoftrans">Date of Transaction</label><br>
        <input type="date" name="dateoftrans" id="dateoftrans"><br>
        <label for="total">Total</label><br>
        <input type="text" name="total" id="total" placeholder="Total Retail" value="0" readonly><br>
        <label for="sold">Qnty of Sold</label><br>
        <input type="number" name="sold" class="sold-inpt" id="sold" placeholder="Quantity" min="1" max="<?php echo $pstck ?>" required>
        <input type="submit"  name="update" value="Sold">
    </form>

    <script>
      $(document).ready(function() {
    const def = $("#stock").val();

    // Function to update stock when quantity sold changes
    $("#sold").on("change", function() {
        var total = def - $(this).val();
        $("#stock").val(total); // Update the stock input field
    });

    // Function to update total when quantity sold or retail price changes
    $("#sold, #pretprice-inpt").on("input", function() {
        var a = Number($("#sold").val());
        var b = Number($("#pretprice-inpt").val());
        var totalq = a * b;
        $("#total").val(totalq); // Update the total input field
    });
});

</script>

    <script>
      // set default date automatically
      var today = new Date();
      var date = today.getFullYear()+'-'+(String(today.getMonth()+1)).padStart(2,'0') +'-'+ String(today.getDate()).padStart(2,'0');
      var dateTime = date
      //document.write(dateTime); //for checking
      document.getElementById("dateoftrans").value = date;
    </script>    
  </div>

    <!-- a BACK button to go to the home page -->
    <div class="container text-center mt-5">
      <a href="home.php"> Back </a>
    <div>
</center>
