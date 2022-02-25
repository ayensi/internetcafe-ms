<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require 'includes/Computer.php';
$computerObj = new Computer();
$result = $computerObj->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet Cafe</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
            rel="stylesheet">
</head>
<body>



<div style="text-align: center" class="row">
    <?php
    if ($result) {
        while ($obj = $result->fetch_object()) {
            echo '<div style="display: inline-block; width: 40%" class="box box-down cyan">';
            echo '<h2>'.$obj->name.'</h2>';
            echo '<img style="text-align: center" height="100px" src="https://upload.wikimedia.org/wikipedia/commons/0/02/Circle-icons-computer.svg" alt="">';
            if($obj->status==='available'){
                echo '<form action="startTable.php" method="get">
<input name="pcId" type="hidden" value=' .$obj->id.'>
<button type="submit"><i class="fa-solid fa-check"></i>Start time</button>
</form>';
            }
            else if($obj->status==='beingUsed'){
                echo 'Time started: '.$_SESSION['startTime'.$obj->id];
                echo '<br>';
                echo '<form action="calculatePrice.php" method="get">
<input name="pcId" type="hidden" value=' .$obj->id.'>
<button type="submit"><i class="fa-solid fa-alarm"></i>Calculate price</button>
</form>';

            }
            else{
                echo 'Time started: '.$_SESSION['startTime'.$obj->id];
                echo '<br>';
                echo 'Time finished: '.$_SESSION['stopTime'.$obj->id];

                if($_SESSION['price'.$obj->id]){
                    echo '<br>';
                    echo 'Price: ₺'.number_format((float) $_SESSION['price'.$obj->id],2);
                }
                echo '<form action="pay.php" method="get">
<input name="pcId" type="hidden" value=' .$obj->id.'>
<button type="submit"><i class="fa-solid fa-money-bill"></i>Pay</button>
</form>';

            }
            echo '</div>';
        }
    }
    ?>
</div>



</body>

</html>
