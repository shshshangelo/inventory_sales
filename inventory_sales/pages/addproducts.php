<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add A New Bread</title>
    <script type="text/javascript" src="../js/sweetalert2@11.js"></script>
    <link rel="stylesheet" href="../styles/sweetalert.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
    body {
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
    }
    .wrapper-main {
        background: #caebf2;
        height: 550px;
        width: 600px;
        border-radius: 10px;
        position: relative;
        top: 130px;
    }
    input[name="prod-name"]::placeholder {        
		text-align: center;
	}input[name="prod-price"]::placeholder {        
		text-align: center;
	}input[name="prod-qnty"]::placeholder {        
		text-align: center;
	}
	input {
        height: 50px;
        width: 59%;
        font-size: 19px;
        border: none;
        text-align: center;
        font-family: 'Public Sans', sans-serif;
        margin-top: 10px;
    }
    h2 {
        padding-top: 36px;
    	font-family: 'Public Sans', sans-serif;
		font-size: 40px;
    	color: #2b6777;
	}
    input[name="prod-price"]{
        position: relative;
        top: 7px;
    }
    input[name="prod-qnty"]{
        position: relative;
        top: 14px;
    }
    input[name="addprod-submit"]{
        position: relative;
        top: 8px;
        width: 20%;
        background: #ff3b3f;
        color: #ffffff;
    }
    img[name="back-btn"]{
        position: absolute;
        height: 32px;
        top: -36px;
        right: 1px;
    }
</style>
<center>
<body>
<div class="wrapper-main">
            <a href="../mainpg.php"><img name="back-btn" src="../img/icons/close-btn.png" alt="Back"></a>
            <form action="../includes/addpross.php" method="POST">
    <h2>Add A New Bread</h2>
    <input type="text" name="prod-name" placeholder="Product Name" pattern="[A-Za-z\s]+" title="Please enter only letters" required>
    <script>
    // Function to restrict input to numeric values only
    function restrictInputToNumeric(element) {
        element.value = element.value.replace(/[^0-9.]/g, ''); // Allow digits and the dot (.)
    }
</script>

<input type="text" name="prod-price-whl" oninput="restrictInputToNumeric(this)" placeholder="Wholesale Price" required>
<input type="text" name="prod-qnt" oninput="restrictInputToNumeric(this)" placeholder="Quantity" pattern="[0-9]+" title="Please enter only numbers" required>

<input type="text" name="prod-price-ret" oninput="restrictInputToNumeric(this)" placeholder="Retail Price" required>
<input type="text" name="prod-stck" oninput="restrictInputToNumeric(this)" placeholder="Stock" required>

    <br>
    <style>
    /* Style for the button */
    input[type="submit"] {
        background-color: red; /* Default background color */
        color: #fff; /* Default text color */
        padding: 10px 20px; /* Adjust padding as needed */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
        transition: background-color 0.3s, color 0.3s; /* Smooth transition */
    }

    /* Hover style */
    input[type="submit"]:hover {
        background-color: #218838; /* New background color on hover */
        color: #fff; /* New text color on hover */
    }
</style>

<!-- Your submit button -->
<input type="submit" name="addprod-submit" value="Add">
</form>

            <?php 
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($url, "addproduct=sucess") == true){
                        echo "<script type='text/javascript'>
                                Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product Added!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                        </script>";
                }
            ?>
            <?php if (isset($_GET['error'])) { ?>
     		    <p class="error" style="color: red;"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>
    </div>
</body>
</center>
</html>
<?php 
   } else {
        header("Location: index.php");
        exit();
    }
 ?>