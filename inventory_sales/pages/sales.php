<div id="content">
<section class="tit-holder">
        <center>
            <button style="font-size: 20px; background-color: #eff1f3; color: #2b6878; outline: none;"><a href="?page=dailysales">Daily Sales</a></button>
            <button style="font-size: 20px; background-color: #32639d; outline: none;"><a href="?page=monthly">Monthly Sales</a></button>
        </center>
     </section>

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

     <table style="width: 100%;" id="prod-table">
        <thead>
    <tr>
        <th style="font-size: 20px; padding: 10px;">Bread No.</th>
        <th style="font-size: 20px; padding: 10px;">Bread Name</th>
        <th style="font-size: 20px; padding: 10px;">Solds</th>
        <th style="font-size: 20px; padding: 10px;">Date</th>
        <th style="font-size: 20px; padding: 10px;">Total</th>
          </tr>
     </thead>

     <center><a class="bck" href="mainpg.php?page=" style="">Back To Homepage</a></center>

     <?php
          //show table from database
          $sql = "SELECT * FROM `trans`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) { 
               $id = $row['id'];                
               $pname = $row['prod_name'];        
               $coutsold = $row['coutof_sold'];        
               $datesold = $row['date_sold'];
               $tot = $row['total'];  
               ?>
               <tbody id="filt">
               <tr>
                    
                    <td class="pname-s" style="font-size: 18px; padding: 10px;"><?php echo $row['id']."."?></td>
                    <td style="font-size: 20px; padding: 10px;"><?php echo $row['prod_name']?></td> 
                    <td style="font-size: 20px; padding: 10px;"><?php echo $row['coutof_sold']?></td>
                    <td class="pname-s" style="font-size: 18px; padding: 10px;"><?php echo $row['date_sold']."."?></td>
                    <td class="pname-s" style="font-size: 18px; padding: 10px;"><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row['total']?></td>
                    
               </tr>
               </tbody>
               <?php
          }
     ?>
     </table>
</div>