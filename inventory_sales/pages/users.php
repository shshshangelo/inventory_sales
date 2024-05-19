<div id="content">
        <section class="tit-holder">
                <a class="add" href="pages/signupform.php">+</a>
                
        </section>
        <table style="width: 100%;" id="prod-table">
        <thead>
                <tr>
                <th style="font-size: 20px; padding: 10px;">ID No.</th>
                <th style="font-size: 20px; padding: 10px;">Full Name</th>
                <th style="font-size: 20px; padding: 10px;">Username</th>
                </tr>
        </thead>
        <?php
                //show table from database
                $sql = "SELECT * FROM `users`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { 
                $id = $row['id'];                
                $uname = $row['name'];        
                $usname = $row['user_name'];          
                ?>
                <tbody id="filt">
                <tr>
                <td class="pname-s" style="font-size: 18px; padding: 10px;"><?php echo $row['id']."."?></td>
                <td style="font-size: 20px; padding: 10px;"><?php echo $row['name']?></td>
                <td style="font-size: 20px; padding: 10px; color: #1b4d89;"><?php echo $row['user_name']?></td>
                </tr>
                </tbody>
                <?php
                }
        ?>
        </table>
</div>

<style>
     .bck{
        text-decoration: none;
        background: #32639d;
        color: #fff;
        padding: 6px 24px 6px 24px;
        position: relative;
        bottom: -719px;
        border-radius: 5px;
    }
    </style>


<center><a class="bck" href="mainpg.php?page=" style="">Back to Homepage</a></center>
