<?php 
// Start session
session_start();

// Suppress error reporting
error_reporting(0);

// Redirect to main page if user is already logged in
if (isset($_SESSION['user_name'])) {
    header("Location: mainpg.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        body {
            background: #2b6777; /* Light gray background */
        }

        .main-container {
            background: #caebf2; 
            height: 500px;
            width: 600px;
            border-radius: 14px;
            margin: 150px auto; /* Center the container */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 100%;
            text-align: center;
        }

        h2 {
            font-family: 'Public Sans', sans-serif;
            font-size: 52px;
            color: black; /* Dark gray for the heading */
            margin-bottom: 20px;
        }

        input {
            height: 60px;
            width: 70%;
            font-size: 20px;
            border: 2px solid #cccccc; /* Light gray border for inputs */
            background: #f9f9f9; /* Off-white background for inputs */
            text-align: center;
            font-family: 'Public Sans', sans-serif;
            margin: 10px 0;
            border-radius: 8px;
        }


        button {
        height: 60px;
		width: 30%;
		position: relative;
		top: 24px;
		border-radius: 10px;
		background: #ff3b3f;
		color: #ffffff;
		font-size: 36px;
		font-family: 'Public Sans', sans-serif;
        }

        button:hover {
            background: #45a049; /* Darker green on hover */
        }

        p.error {
            font-size: 20px;
            font-family: Arial, sans-serif;
            color: #ff0000; /* Red color for error message */
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <form class="login-form" action="includes/login.php" method="post">
            <h2>Raiza Mae Bakeshop</h2>
            <div class="input-container">
<input type="text" name="uname" placeholder="Username" value="<?php if(isset($_GET['uname'])) echo htmlspecialchars($_GET['uname']); ?>"><br>
            </div>
            <div class="input-container">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit">Login</button>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>
