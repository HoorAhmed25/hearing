<?php session_start();
require_once 'connection.php';
if(isset($_POST['submit'])){
$id = $_POST['id_mother'];
$ABRR = $_POST['ABRR'];
$ABRL = $_POST['ABRL'];
$TympanometryR = $_POST['TympanometryR'];
$TympanometryL = $_POST['TympanometryL'];
$OAER = $_POST['OAER'];
$OAEL = $_POST['OAEL'];

/*$ABR_Date = CURDATE();
$Tymp_Date = CURDATE();
$OAE_Date = CURDATE();*/
$date = date("Y-m-d");
$DEC_r = $_POST['dec-r'];
$DEC_L = $_POST['dec-l'];
$query1 = "0";
$query2 = "0";
$query3 = "0";
$query4 = "0";
$location = $_SESSION['hospital'];
echo $id;
//1
if ($ABRR != "not" && $ABRL !="not")
{
    $insert1 = "UPDATE hearing_disorders_child_result SET ABR_r = '$ABRR', ABR_L = '$ABRL' , ABR_Date = '$date', location = '$location'  WHERE child_id='$id';";
    $query1= pg_query($conn,$insert1) or die("error:".pg_last_error($conn));
}
//2
if ($TympanometryR != "not" && $TympanometryL != "not")
{
    $insert2 = "UPDATE hearing_disorders SET Tympanometry_r = '$TympanometryR', Tympanometry_L = '$TympanometryL', Tymp_Date = '$date'   WHERE child_id='$id'; ";
    $query2= pg_query($conn,$insert2) or die("error:".pg_last_error($conn));
}
//3
if ($OAER != "not" && $OAEL != "not")
{
    $insert3 = "UPDATE hearing_disorders SET OAE_r = '$OAER', OAE_L = '$OAEL' , OAE_Date = '$date'  WHERE child_id='$id'; ";
    $query3= pg_query($conn,$insert3) or die("error:".pg_last_error($conn));
}
//Decision
if ($DEC_r != "not" &&  $DEC_L != "not")
{
    $insert4 = "UPDATE hearing_disorders SET Decision_r='$DEC_r' ,Decision_L='$DEC_L', Decision_Date = '$date'  WHERE child_id='$id';";
    $query4= pg_query($conn,$insert4) or die("error:".pg_last_error($conn));
}



if($query1 || $query2 || $query3 || $query4) {

    echo '<script type="text/javascript">';
     echo 'alert("تم التسجيل بنجاح");';
    echo '</script>';
  echo '<script type="text/javascript">';echo'window.location.href="ID_mother.php";';echo '</script>';
}
else{
    echo 'FAILD';
}
}


else if(isset($_POST['close'])){
    header("Location: index.php");
}

?>