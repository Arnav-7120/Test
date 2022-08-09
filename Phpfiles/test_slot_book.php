<?php
$mysqli = new mysqli('localhost', 'root', '', 'appointment_system');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }
            $stmt->close();
        }
    }
    
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $timeslot = $_POST['timeslot'];
    $dept = $_POST['department'];
    $office = $_POST['officer'];
    $mysqli = new mysqli('localhost', 'root', '', 'appointment_system');
    $stmt = $mysqli->prepare("select * from bookings where date ='$date' AND timeslot='$timeslot'");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{ 
            $stmt = $mysqli->prepare("INSERT INTO bookings (name, timeslot, department,officer, date) VALUES ('$name', '$timeslot','$dept', '$office', '$date')");
            $stmt->bind_param('ssss', $name, $timeslot, $email, $date);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $bookings[] = $timeslot;
            $stmt->close();
            $mysqli->close();
       }
    }
}
$duration=30;
$cleanup=30;
$start="10:30";
$end="16:00";
$date='date';
function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();
    
    for($intStart = $start; $intStart<=$end; $intStart->add($interval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);

        if($endPeriod>$end){
        break;
        }
        
        $slots[] = $intStart->format("H:iA")." - ". $endPeriod->format("H:iA");
        //$intStart=$intStart->add($interval);
        
    }
    
    return $slots;
}
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
    function show(){
        $("#myModal").show();
    }
</script>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <style>
        @media only screen and (max-width: 760px),(min-device-width: 802px) and (max-device-width: 1020px) {

/* Force table to not be like tables anymore */
table, thead, tbody, th, td, tr {
  /*  display: block;
*/
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
</head>

<body>
    <div id="container"> 
        <h1 class="text-center">Book for Date: <?php echo date('d/M/Y', strtotime($_GET['date'])); ?></h1><hr>
        <div class="row" style="display:flex; width:100%; overflow:clip;position:relative;">
        <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
            foreach ($timeslots as $ts){
               /* $timeslots->$duration+$duration;*/
                $bookings = array();
                 ?>
        <div class="col-md-12">
            <?php echo isset($msg)?$msg:""; ?>
        </div>
            
            
            
            
            
            
        <div class="col-md-2" style="position:static;"  >
        <button class="btn btn-success  "id="btnFrometime"  onclick="show();" date-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
        
    </div>
    <?php } ?>
</div>
</div>   

<div id="myModal" class="modal fade"  role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Booking for: <span id="slot"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6 col-md-offset-3">
               <?php echo(isset($msg))?$msg:""; ?>
               <form action="test_slot_book.php" method="post" autocpmplete="off">
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
           
                      <!--  <div class="col-md-12">
                            <form action="test_slot_book.php" method="post">
                               <div class="form-group">
                                    <label for="">Time Slot</label>
                                    <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input required type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <input required type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Officer</label>
                                    <input required type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group pull-right">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>-->
                    </div>
                </div>
                
            </div>

        </div>
    </div>   
            
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $("#fromtime").click(function(){
            $("#myModal").modal("show");   
        });
    $(".book").click(function(){
    var timeslot = $(this).attr('data-timeslot');
    $("#slot").html(timeslot);
    $("#timeslot").val(timeslot);
    $("#myModal").modal("show");
});
</script> 
</body>

</html>
