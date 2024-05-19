<div id="content">
        <section class="tit-holder">
        <div class="srch-holder" style="position: absolute; left: -400 px;">
    <input type="text" name="srch" id="srch" class="srch-nav" placeholder="Search Bread Name..." style="font-size: 20px; padding: 2px;">
</div>

                <a class="add" href="pages/addproducts.php">+</a>     
        </section>

        <style>
    th a:hover {
        color: blue; /* Change the text color on hover */
    }

    th a:hover {
        color: blue; /* Change the text color on hover */
    }

    th a {
        cursor: pointer; /* Change cursor to pointer */
    }

    .oprt-btn:hover {
        color: blue; /* Change the text color on hover */
    }

    .oprt-btn {
        cursor: pointer; /* Change cursor to pointer */
    }
</style>

        <table style="width: 100%;" id="prod-table">
        <thead>
    <tr>
        <th style="font-size: 20px; padding: 10px;">Bread No.</th>
        <th style="font-size: 20px; padding: 10px;">Bread Name</th>
        <th style="font-size: 20px; padding: 10px;">Quantity</th>
        <th style="font-size: 20px; padding: 10px; text-decoration: underline;"><a href="?page=wholesale">Bread Wholesale Price</a></th>
        <th style="font-size: 20px; padding: 10px; text-decoration: underline;"><a href="?page=retail">Bread Retail Price</a></th>
        <th style="font-size: 20px; padding: 10px;">Stock</th>
        <th style="font-size: 20px; padding: 10px;">Action</th>
    </tr>
</thead>

<?php
    //show table from database
    $sql = "SELECT * FROM `productss`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) { 
        $id = $row['id'];                
        $pname = $row['prod_name'];  
        $prod_qnt = $row['prod_qnt'];
        $prod_stock = $row['prod_stock'];      
        $pwhlprice = $row['prod_whlsale'];        
        $pretprice = $row['prod_retail'];  
?>

<tbody id="filt">
    <tr>
        <td class="pname-s" style="font-size: 18px; padding: 10px;"><?php echo $row['id']."."?></td>
        <td style="font-size: 20px; padding: 10px;"><?php echo $row['prod_name']?></td>
        <td style="font-size: 20px; padding: 10px;"><?php echo $row['prod_qnt']?></td>
        <td style="font-size: 20px; padding: 10px;"><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row['prod_whlsale']?></td>
        <td style="font-size: 20px; padding: 10px;"><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row['prod_retail']?></td>
        <td style="font-size: 20px; padding: 10px;"><?php echo $row['prod_stock']?></td>
        <td class='btn-wrapper-ed' style="font-size: 18px; padding: 10px;">
            <?php echo "<a class='oprt-btn' href='pages/minicount.php?edit&prod_id={$id}' style='text-decoration: underline;'>Sold</a>";?>
            <?php echo "<a class='oprt-btn remove-btn' href='pages/minicount.php?remove&prod_id={$id}' style='text-decoration: underline;'>Remove</a>";?>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all elements with class 'remove-btn'
    var removeButtons = document.querySelectorAll('.remove-btn');
    
    // Loop through each remove button
    removeButtons.forEach(function(button) {
        // Add a click event listener
        button.addEventListener('click', function(event) {
            // Prevent the default link behavior
            event.preventDefault();
            
            // Show a confirmation dialog using SweetAlert
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                // If user confirms, proceed to the link's href
                if (result.isConfirmed) {
                    window.location.href = button.getAttribute('href');
                }
            });
        });
    });
});
</script>



        </td>
    </tr>
</tbody>


                <?php
                }
        ?>
        </table>
        <?php 
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($url, "update=sucess") == true){
                        echo "<script type='text/javascript'>
                                Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product Updated!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                        </script>";
                } elseif (strpos($url, "sold=sucess") == true){
                        echo "<script type='text/javascript'>
                                Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product Sold!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                        </script>";
                }
        ?>
        </body>
        <script>
        //search func
        $(document).ready(function(){
                $('#srch').keyup(function(){
                search_table($(this).val());
                });
                function search_table(value){
                $('#filt tr').each(function(){
                        var found = 'false';
                        $(this).each(function(){
                                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >=0 ) {
                                found = 'true'
                                }
                        });
                        if(found == 'true'){
                                $(this).show();
                        } else {
                                $(this).hide();
                        }
                });
                }
        });
        </script>
        
</div>