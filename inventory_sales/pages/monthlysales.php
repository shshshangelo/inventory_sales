
<div id="content">
     <section class="tit-holder">
     <div class="date-holder">
    <label for="startDate" style="font-size: 20px; padding: 10px;">Search Date:</label>
    <input type="text" name="startDate" id="startDate" class="date-picker" style="font-size: 20px"/>
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

        <a href="pages/monthlychrt.php" style="float: right; margin-top: 6px; margin-right: 6px;"> <img style="height: 34px;" src="img/icons/stats.png" alt="chart"> </a>
     </section>
     <?php
        //$ssql = "SELECT min(id) as idm, date_sold, sum(total) as totd FROM trans group by date_sold";
        //$sql = "SELECT MONTHNAME(date_sold) as mname, 
        //        sum(total) as tot
        //        FROM trans
        //        GROUP BY MONTH(date_sold)";
        $sql = "SELECT YEAR(date_sold) AS year,
                MONTHNAME(date_sold) AS month,
                sum(total) as tot
                FROM trans 
                GROUP BY year(date_sold);";
        $result = $conn->query($sql);
     ?>



     <div class="get_data">
     <table style="width: 100%;" id="prod-table">
     <thead>
            <tr>
            <th style="font-size: 20px; padding: 10px;">Month & Year.</th>
            <th style="font-size: 20px; padding: 10px;">Monthy Sold.</th>
            </tr>
     </thead>

     <center><a class="bck" href="mainpg.php?page=sales" style="">Back To Sales</a></center>


        <?php while ($row = $result->fetch_object()): ?>
            <tbody id="filt">
            <tr>
                <td id="date" style="font-size: 20px; padding: 10px;"><?php echo $row->month; echo " "; echo $row->year; ?></td>
                <td style="font-size: 20px; padding: 10px;"><?php echo '<img class="coin" src="img/icons/philippine-peso.png">'.$row->tot; ?></td>
            </tr>
            </tbody>
        <?php endwhile; ?>
     </table>
     </div>
</div>
<script>
    $(function(){
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            
            
            
            function isDonePressed(){
                            return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                        }

                        if (isDonePressed()){
                            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                            $(this).datepicker('setDate', new Date(year, month, 1));
                            let value = $(this).val().toLowerCase();
                            $("#filt tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                            console.log('Done is pressed')
                            console.log(value)
                        }
            
            
          
        }
    });
});
</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }
.ui-widget {
    font-size: 15px;
    font-family: 'Public Sans', sans-serif;
}
</style>
<script>
$(document).ready(function(){
  $("#startDate").on("change", function() {
    let value = $(this).val().toLowerCase();
    console.log(value)
    $("#filt tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>