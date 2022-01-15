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
       .cardbody{
	margin-top: 50px;
    border-radius: 20px;
	box-shadow: 3px 4px #888888;
	background-color: white;
	
	padding-top: 20px;
	margin: auto;
    margin-top: 100px; !important
    transition: 0.5s;
}
.cardbody:hover{
	
	background-color: white;
	
	padding-top: 20px;
	border-radius: 20px;
	box-shadow: 5px 6px 5px 6px #888888;
}
   .loginButton{
   background-image: linear-gradient(to right, #000428, #004e92); 
    color: white;
        padding-left: 20px;
               padding-right: 20px;
}
.loginButton:hover{
    background-color: #004e92;  
  
    
 
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
          <li class="breadcrumb-item active text-dark" aria-current="page">خطوات التسجيل</li>
        </ol>
      </div>
    
      <div class="container">

        <div class="row mt-5">
            <div class="col-2"></div>
          <div class="col-8 text-right">
              <div class="ml-3 pl-5 mb-3 mt-1 cardbody">
                <ul class="list-group list-group-flush text-right">
                  <h3 class="badge text-center text-white" style="font-size: 22px; background-image: linear-gradient(to right, #000428, #004e92);">خطوات العمل على البرنامج فى أربع خطوات سهلة :</h3>
                  <li class="list-group-item fs-5">1- اضغط على بحث</li>
                  <li class="list-group-item fs-5">2- قم بادخال الرقم القومى للأم</li>
                  <li class="list-group-item fs-5">3- ستظهر لك شاشة البيانات... تأكد من ان البيانات صحيحة</li>
                  <li class="list-group-item fs-5">4- قم بادخال نتيجة الاختبارات الثلاثة</li> 
                </ul>
                  <div class="col-2 mt-3">
              <button type="submit" class="btn loginButton mr-5 mb-4" style="font-size : 22px;" onclick="location.href='ID_mother.php';">بحث</button>
              </div>
              </div>
              
               
          </div>
        </div>
        
      </div>
   
      
   <script src="../js/jquery-3.3.1.min.js"></script> 
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <script src="../js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="../js/mine.js"></script>
    </body>
</html>
<?php
      }?>