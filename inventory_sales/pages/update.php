<!-- Footer -->
<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

//require "dbhandler.php"; 
require "../includes/dbh.php";
?>

<?php
   // checking if the variable is set or not and if set adding the set data value to variable userid
   if(isset($_GET['prod_id']))
    {
      $prodid = $_GET['prod_id']; 
    }
      // SQL query to select all the data from the table where id = $userid
      $query="SELECT * FROM productss WHERE id = $prodid ";
      $view_prods= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_prods))
        {              
          $id = $row['id'];                
          $pname = $row['prod_name'];
          $pwhlprice = $row['prod_whlsale'];         
          $pqnt = $row['prod_qnt']; 

          $pretprice = $row['prod_retail']; //$pprice     //prod_price      
          $pstck = $row['prod_stock']; //$pqnty        //prod_qnty
        }
 
    //Processing form data when form is submitted
    if(isset($_POST['update'])) 
    {
      $pname = $_POST['pname-inpt'];
      $pwhlprice = $_POST['pwhlprice-inpt'];
      $pqnt = $_POST['pqnt-inpt'];

      $pretprice = $_POST['pretprice-inpt'];
      $pstck = $_POST['pstck-inpt'];
      
      // SQL query to update the data in user table where the id = $userid 
      $query = "UPDATE productss SET prod_name = '{$pname}' , prod_retail = '{$pretprice}' , prod_stock = '{$pstck}' , prod_whlsale = '{$pwhlprice}' , prod_qnt = '{$pqnt}' WHERE id = $prodid";
      $update_prod = mysqli_query($conn, $query);
      header("Location: ../mainpg.php?pages=?update=sucess");
      exit();
    }             
?>
<head>
  <title>Update Product</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
   body{
		background: #f1f1f1;
	}
  .main-container {
    background: #caebf2;
    height: 750px;
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
	}
	input {
    height: 50px;
    width: 70%;
    font-size: 25px;
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
		font-size: 30px;
		font-family: 'Public Sans', sans-serif;
	}
  img[name="back-btn"]{
    position: absolute;
    height: 50px;
    top: -55px;
    right: 1px;
}
label {
    font-size: 25px;
    font-family: 'Public Sans', sans-serif;
    color: #a9a9a9;
}

</style>
<center>
  <div class="main-container">
    <a href="../mainpg.php?page=wholesale"><img name="back-btn" src="../img/icons/close-btn.png" alt="Back"></a>
  <h1 class="text-center">Update Product</h1>
    <form action="" method="post">
        <label for="pname-inpt">Product Name</label><br>
        <input type="text" name="pname-inpt"  value="<?php echo $pname  ?>"><br>
        <label for="pwhlprice-inpt">Wholesale Price</label><br>
        <input type="number" name="pwhlprice-inpt" step="any" value="<?php echo $pwhlprice  ?>"><br>
        <label for="pqnt-inpt">Quantity</label><br>
        <input type="number" name="pqnt-inpt" step="any" value="<?php echo $pqnt  ?>"><br>
        <label for="pretprice-inpt">Retail Price</label><br>
        <input type="number" name="pretprice-inpt" step="any" value="<?php echo $pretprice  ?>"><br>
        <label for="pstck-inpt">Stocks</label><br>
        <input type="number" name="pstck-inpt" value="<?php echo $pstck  ?>"><br>
        <style>
    /* Style for the "Update" button */
    input[type="submit"][name="update"][value="Update"] {
        background-color: red; /* Default background color */
        color: #fff; /* Default text color */
        padding: 10px 20px; /* Adjust padding as needed */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
        transition: background-color 0.3s, color 0.3s; /* Smooth transition */
    }

    /* Hover style for the "Update" button */
    input[type="submit"][name="update"][value="Update"]:hover {
        background-color: #218838; /* New background color on hover */
        color: #fff; /* New text color on hover */
    }
</style>

<!-- Your submit button -->
<input type="submit" name="update" value="Update">
    </form>    
  </div>

    <!-- a BACK button to go to the home page -->
    <div class="container text-center mt-5">
      <a href="home.php"> Back </a>
    <div>
</center>
<?php 
   } else {
        header("Location: index.php");
        exit();
    }
 ?>