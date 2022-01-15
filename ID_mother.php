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
	width: 500px;
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
        padding-left: 15px;
               padding-right: 15px;
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
            <li class="breadcrumb-item"><a href="steps.php">خطوات التسجيل</a></li>
          <li class="breadcrumb-item active text-dark" aria-current="page">بحث</li>
        </ol>
      </div>
     
        <div class="container ">
             <form name="motherId" method="post" action="Data.php" >
          <div class="row">
            <div class="col-3">
                <div class="mb-3 text-right">
                  <label for="ID_Mother" class="form-label h5">الرقم القومى للأم :</label>
                  <input type="text" name="id_mother" class="form-control" id="NID" aria-describedby="ID_Mother" onchange="validationID()" required>
                  <p  id="errror" class="form-text"></p>
                  </div>
                  </div>
                <div class="col-2 mt-4">
                <button type="submit"  class="btn loginButton" name="search"  id="activated" style="display: block;"> بحث</button>
              </div>
                 </div>
              </form>
            </div>
        
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