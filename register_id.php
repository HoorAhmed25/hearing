<?php
session_start();
require_once 'connection.php';
if(isset($_POST['id_mother'])){
$id = $_POST['id_mother'];
$insert = "select * from hearing_disorders where ID_Mother = '$id'";
$query= mysqli_query($conn,$insert) or die("error:".mysqli_error($conn));
$result=mysqli_fetch_array($query);
$name_unit=$result['num_unit'];
$ins = "select * from units where num = '$name_unit'";
$qu= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
$res=mysqli_fetch_array($qu);
if($query && $qu) {
    $_SESSION['id_mother']=$id;
    $_SESSION['child_name']=$result['child_name'];
    $_SESSION['mother_name']=$result['mother_name'];
    $_SESSION['name']=$res['name'];
    $_SESSION['Date']=$result['Date'];
    $_SESSION['hospital_name']=$result['hospital_name'];
    $_SESSION['phone']=$result['phone'];
    $_SESSION['Birth_Date']=$result['Birth_Date'];
    
    header("location: Data.php");
}
else{
    echo 'FAILD';
}
}


?>

<?php
session_start();
require_once 'connection.php';
if(isset($_POST['id_mother'])){
$id = $_POST['id_mother'];
$insert = "select * from hearing_disorders where ID_Mother = '$id'";
$query= mysqli_query($conn,$insert) or die("error:".mysqli_error($conn));
$result=mysqli_fetch_array($query);
if($query) {
    $_SESSION['ABR_r']=$result['ABR_r'];
    $_SESSION['ABR_L']=$result['ABR_L'];
    $_SESSION['Tympanometry_r']=$result['Tympanometry_r'];
    $_SESSION['Tympanometry_L']=$result['Tympanometry_L'];
    $_SESSION['OAE_r']=$result['OAE_r'];
    $_SESSION['OAE_L']=$result['OAE_L'];
    $_SESSION['ABR_Date']=$result['ABR_Date'];
    $_SESSION['Tymp_Date']=$result['Tymp_Date'];
    $_SESSION['OAE_Date']=$result['OAE_Date'];
    
}
else{
    echo 'FAILD';
}
}


?>