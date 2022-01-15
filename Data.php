<?php session_start();if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    header("Location: index.php");
    die();
} else{ include 'connection.php'; ?><html dir="rtl">
<head>
    <title>وزارة الصحة و السكان - مبادرة الاكتشاف المبكر و علاج ضعف و فقدان السمع للأطفال حديثي الولادة</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        nav{
   background-image: linear-gradient(to right, #000428, #004e92);
    text-align: right;
    padding-right: 30px;
    width: 100%;
    height: 80px;
}
        label{
            font-size: 18px;
            color: darkblue;
        }
        #form-container{
            border-radius: 20px;
	box-shadow: 3px 4px #888888;
	background-color: white;
	padding-top: 20px;
	margin: auto;
    margin-top: 50px; !important
    transition: 0.5s;
    text-align: right;
    
}
        #form-container:hover{
            box-shadow: 5px 6px 5px 6px #888888;
             transition: 0.5s;
        }
     
   .loginButton{
   background-image: linear-gradient(to right, #000428, #004e92); 
    color: white;
        padding-left: 15px;
               padding-right: 15px;
}
.loginButton:hover{
    background-color: #004e92;  
  
    
 
}
        .backButton{
    
    background-color: darkgray;
   padding-left: 15px;
               padding-right: 15px;
}
.backButton a{
    text-decoration: none;
    color: white;
    
}
.backButton:hover{
    background-color: #6a7575;
}
    </style>
</head>

<body style="background-color:#eeeeee; overflow-x: hidden; overflow-y:hidden;">
    <nav>
        <div class="row">
            <div class="col-1"><img src="img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid"
                    style="height:70px;  margin-top:5px;" /></div>
            <div class="col-2">
                <h6 class="text-white d-inline" style=" font-weight: bold;"><br>جمهورية مصر العربية <br>وزارة الصحة و
                    السكان </h6>
            </div>
             <div class="col-2"></div>
            <div class="col-4"><h4 class="text-white ml-5 mt-4"><?php echo $_SESSION['hospital']; ?></h4></div>
         <div class="col-2 pt-1"><img src="img/100million.png" class="img-fluid" style="height:80px;" /></div>
        </div>
    </nav>
      <div class="mb-3"  aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: gainsboro;">
          <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="steps.php">خطوات التسجيل</a></li>
            <li class="breadcrumb-item"><a href="ID_mother.php">بحث بالرقم القومى للأم</a></li>
          <li class="breadcrumb-item active text-dark" aria-current="page">البيانات الأساسية</li>
        </ol>
      </div>
    <?php 
       if(isset($_POST['search'])){
$id = $_POST['id_mother'];
$insert = "select * from hearing_disorders_child where mother_nid = '$id'";
$query= pg_query($conn,$insert) or die("error:".pg_last_error($conn));
$result=pg_fetch_array($query);

        if(pg_num_rows($query) > 0){
    $name_unit=$result['reporting_unit_id'];
$ins = "select * from hearing_disorders_unit where code = '$name_unit'";
$qu= pg_query($conn,$ins) or die("error:".pg_last_error($conn));
$res=pg_fetch_array($qu);   
            
            
$child_id=$result['id'];
$get_hospital = "select hospital_id,date from hearing_disorders_reservation where child_id = '$child_id'";
$query2= pg_query($conn,$get_hospital) or die("error:".pg_last_error($conn));
$result_hospital=pg_fetch_array($query2);             
  $result_hospital_code =   $result_hospital['hospital_id'];
$get_hospital1 = "select name from hearing_disorders_hospital where code = '$result_hospital_code'";
$query3= pg_query($conn,$get_hospital1) or die("error:".pg_last_error($conn));
$result_hospital_name=pg_fetch_array($query3);    
    ?>  
     
           <div id="form-container" class="container">
               <form name="data" method="post" action="tests.php">
           <div class="row">
                        <div class="mb-3 col-3 border-right border-left">
                            <label for="marriageAddress" class="form-label">الرقم القومى للأم :</label>
                            <input type="text" class="form-control" name="id_mother" value="<?php echo $result['mother_nid'] ?>" >
                        </div>
                        <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">اسم الأم :</label>
                            <input type="text" class="form-control " value="<?php echo $result['mother_name'] ?>">
                        </div>
                         <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">اسم الطفل :</label>
                            <input type="text" class="form-control " value="<?php echo $result['name'] ?>">
                        </div>
                <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">تاريخ الميلاد :</label>
                            <input type="text" class="form-control " value="<?php echo $result['birthdate'] ?>">
                        </div>
                    </div>
               <div class="row">
                       <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">رقم الهاتف :</label>
                            <input type="text" class="form-control " value="<?php echo $result['phone'] ?>">
                        </div>
                    <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">اسم الوحدة :</label>
                            <input type="text" class="form-control " value="<?php echo $res['name'] ?>">
                        </div>
                <?php 
            if($result_hospital_name['name'] != $_SESSION['hospital']){?>
                 <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">اسم المستشفى المُحول إليها  :</label>
                            <input type="text" class="form-control bg-danger" value="<?php echo $result_hospital_name['name'] ?>">
                        </div>  
            <?php
                                        }
                   else{?>     
                    <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">اسم المستشفى المُحول إليها  :</label>
                            <input type="text" class="form-control " value="<?php echo $result_hospital_name['name'] ?>">
                        </div>
                   <?php
                       }?>
                    <div class="mb-3 col-3 border-right ">
                            <label for="address" class="form-label">تاريخ الإحالة :</label>
                            <input type="text" class="form-control " value="<?php echo $result_hospital['date'] ?>">
                        </div>
                        
                    </div>
                   <div class="row">
                   <button class="btn text-white loginButton mb-5 mr-5 ml-3" id="submitB" type="submit" name="submit">استكمال</button>
            <button class="btn text-white backButton mb-5" type="button" name="back">
                <a href="ID_mother.php">رجوع</a></button>
                   </div>
</form>
    </div>
      <?php }
         else{ ?>
             <h3 class="text-center pt-3">عفوا! لا يوجد بيانات </h3>
        <?php }
           
           }
       else{
           echo 'not submit';
       }
       ?>
        
     <script src="js/jquery-3.3.1.min.js"></script> 
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>  
        <script src="js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="ID_Validation.js"></script>
    </body>
</html>
<?php
      }?>