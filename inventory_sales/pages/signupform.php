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
    <title>Add New Management</title>
    <script type="text/javascript" src="../js/sweetalert2@11.js"></script>
    <link rel="stylesheet" href="../styles/sweetalert.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@700&display=swap');
    body{
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
	}
    .wrapper-main {
        background: #caebf2;
        height: 400px;
        width: 600px;
        border-radius: 10px;
        position: relative;
        top: 150px;
    }
    .addform {
        position: inherit;
		top: 28px;
	}
    input[name="name"]::placeholder {        
		text-align: center;
	}input[name="uid"]::placeholder {        
		text-align: center;
	}input[name="pwd"]::placeholder {        
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
    .inpt-usr-n {
        position: relative;
        top: 7px;
    }
    .inpt-pwd-n {
        position: relative;
        top: 15px;
    }
    button {
        height: 40px;
        width: 40%;
        position: relative;
        top: 24px;
        border: none;
        background: #ff3b3f;
        color: #ffffff;
        font-size: 20px;
        font-family: 'Public Sans', sans-serif;
    }

    h2 {
    	font-family: 'Public Sans', sans-serif;
		font-size: 31px;
    	color: #a9a9a9;
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
            <a href="../mainpg.php?page=users"><img name="back-btn" src="../img/icons/close-btn.png" alt="Back"></a>
            <form class="addform" action="../includes/signup.php" method="POST">
            <h2>Add A New Management</h2>
                <input type="text" name="name" placeholder="Full Name" pattern="[A-Za-z\s]+" title="Please enter only letters" required>
                <input class="inpt-usr-n" type="text" name="uname" placeholder="Username" required>
                <input class="inpt-pwd-n" type="password" name="pwd" placeholder="Password" required>
                <style>
    /* Style for the "Sign Up" button */
    button.sbmt[name="signup-submit"] {
        background-color: red; /* Default background color */
        color: #fff; /* Default text color */
        padding: 10px 20px; /* Adjust padding as needed */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
        transition: background-color 0.3s, color 0.3s; /* Smooth transition */
    }

    /* Hover style for the "Sign Up" button */
    button.sbmt[name="signup-submit"]:hover {
        background-color: green; /* New background color on hover */
        color: #fff; /* New text color on hover */
    }
</style>

<!-- Your "Sign Up" button -->
<button class="sbmt" type="submit" name="signup-submit">Sign Up</button>
            </form>
            <?php 
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($url, "signup=sucess") == true){
                    echo "<script type='text/javascript'>
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'User Added!',
                            showConfirmButton: false,
                            timer: 1500
                            })
                    </script>";
            }
            ?>
            <?php if (isset($_GET['error'])) { ?>
     		    <p class="error"><?php echo $_GET['error']; ?></p>
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

