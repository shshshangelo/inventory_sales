<?php
// Check if prod_id is set and not empty
if (isset($_POST['prod_id']) && !empty($_POST['prod_id'])) {
    // Include your database connection file
    require "../includes/dbh.php";

    // Sanitize the input to prevent SQL injection (assuming you're using MySQLi)
    $prod_id = mysqli_real_escape_string($conn, $_POST['prod_id']);

    // Perform the database operation to move the product to the 'temporary_removed' table
    $sql = "INSERT INTO temporary_removed (prod_id) VALUES ('$prod_id')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Product moved successfully
        echo "Product moved to temporary_removed table.";
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle case where prod_id parameter is not set or empty
    echo "Invalid product ID.";
}
?>
