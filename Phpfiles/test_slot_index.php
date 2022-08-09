<?php

function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'appointment_system');
    $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date)=?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }
            $stmt->close();
        }
    
    $date='date';
    // Create array containing abbreviations of days of week.
    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    // How many days does this month contain?
    $numberDays = date('t',$firstDayOfMonth);

    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);

    // What is the name of the month in question?
    $monthName = $dateComponents['month'];

    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];

    // Create the table tag opener and day headers
     
    $datetoday = date('Y-m-d');
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a href='' class='btn btn-xs btn-primary' data-month='".date('m')."' data-year='".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."' class='btn btn-xs btn-primary'>Next Month</a></center><br>";
    
    $calendar .= "<tr>";

    // Create the calendar headers
    foreach($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    } 
    
    // Create the rest of the calendar
    // Initiate the day counter, starting with the 1st.
    $currentDay = 1;
    $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

    if($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar .= "<td  class='empty'></td>"; 
        }
    }
     
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
    while ($currentDay <= $numberDays) {
         //Seventh column (Saturday) reached. Start a new row.
         if ($dayOfWeek == 7) {
             $dayOfWeek = 0;
             $calendar .= "</tr><tr>";
         }
          
         $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
         $date = "$year-$month-$currentDayRel";
         $dayname = strtolower(date('l', strtotime($date)));
         $eventNum = 0;
         $today = $date==date('Y-m-d')? "today" : "";
         $bookings = array();
         if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
         }elseif(in_array($date, $bookings)){
            $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='text_slot_book.php?date=".$date."' class='btn btn-success btn-xs'>Already Booked</a>";
         }else{
             $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='test_slot_book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
         }
         
         
         $calendar .="</td>";
         //Increment counters
         $currentDay++;
         $dayOfWeek++;
     }
     
     //Complete the row of the last week in month, if necessary
     if ($dayOfWeek != 7) { 
        $remainingDays = 7 - $dayOfWeek;
        for($l=0;$l<$remainingDays;$l++){
            $calendar .= "<td class='empty'></td>"; 
        }
     }
     
    $calendar .= "</tr>";
    $calendar .= "</table>";
    return $calendar;
}
}
?>
<html>
<body bgcolor = "green">
<style>
        @media only screen and (max-width: 760px),
(min-device-width: 802px) and (max-device-width: 1020px) {

/* Force table to not be like tables anymore */
table, thead, tbody, th, td, tr {
    display: block;

}

.empty {
    display: none;
}

/* Hide table headers (but not display: none;, for accessibility) */
th {
    position: absolute;
    top: -9999px;
    left: -9999px;
}

tr {
    border: 1px solid #ccc;
}

td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
}

/*
Label the data
*/
td:nth-of-type(1):before {
    content: "Sunday";
}
td:nth-of-type(2):before {
    content: "Monday";
}
td:nth-of-type(3):before {
    content: "Tuesday";
}
td:nth-of-type(4):before {
    content: "Wednesday";
}
td:nth-of-type(5):before {
    content: "Thursday";
}
td:nth-of-type(6):before {
    content: "Friday";
}
td:nth-of-type(7):before {
    content: "Saturday";
}


}

/* Smartphones (portrait and landscape) ----------- */

@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
body {
    padding: 0;
    margin: 0;
}
}

/* iPads (portrait and landscape) ----------- */

@media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
body {
    width: 495px;
}
}

@media (min-width:641px) {
table {
    table-layout: fixed;
}
td {
    width: 33%;
}
}

.row{
margin-top: 20px;
}

.today{
background:yellow;
}
</style>
    <div class="">
    <div class="row"> 
   <div class="col-md-12">
       <?php 
       $dateComponents= getdate();
       $month=$dateComponents['mon'];
       $year=$dateComponents['year'];
       echo build_calendar($month,$year);
       ?>
    <div id="container"> 
        <h1 class="text-center">Book for Date: <?php echo date('d/m/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
        <div class="col-md-12">
            <?php echo isset($msg)?$msg:""; ?>
        </div>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts){
                $bookings = array();
                 ?>
        <div class="col-md-2">
        <div class="form-group">
            <?php if(in_array($ts,$bookings)){ ?>
                <button class="btn btn-danger"><?php echo $ts; ?></button>
                <?php }else{ ?> 
                    <button class="btn btn-success "date-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                    <?php } ?> 
        
           </div>
    </div>
           <?php } ?> 
</div>
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="test_slot_index.php" method="post">
                               <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input required type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input required type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>   
          <!-- <div class="col-md-6 col-md-offset-3">
               <?php echo(isset($msg))?$msg:""; ?>
               <form action="test_slot_index.php" method="post" autocomplete="off">
                   <div class="form-group">
                       <label for="">Name</label>
                       <input required type="text" class="form-control" name="name">
                   </div>
                   <div class="form-group">
                       <label for="">Email</label>
                       <input required type="email" class="form-control" name="email">
                   </div>
                   <div class="form-group">
                       <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                   </div>
               </form>
           </div>
            
        </div> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    $(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#myModal").modal("show");
});
</script> 
</body>

</html>
