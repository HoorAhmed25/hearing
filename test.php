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
            <li class="breadcrumb-item"><a href="Data.php">البيانات الاساسية</a></li>
          <li class="breadcrumb-item active text-dark" aria-current="page">نتائج الفحص</li>
        </ol>
      </div>
    
      <form name="Info" method="post" action="register.php">
            <section>
                <div id="form-container" class="container">
                    <div class="row pt-2">
                        <div class="form-check col-4 ml-2 ">
                            <label class="form-check-label pt-2 pl-2">الجنسية : </label>
                            <input onchange="foreignerCheck()" type="radio" name="nationality" id="egyptian"
                                value="مصرى" checked>
                            <label class="ml-3" for="egyptian"> مصرى </label>
                            <input onchange="foreignerCheck()" type="radio" name="nationality" id="foreigner"
                                value="غير مصرى">
                            <label for="foreigner">غير مصرى </label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div id="enational" class="mb-3 col-4 border-right border-left">
                            <label for="nationalId" class="form-label">الرقم القومى :</label>
                            <input type="text" class="form-control w-75" name="nationalId" id="nationalId"
                                maxlength="14" autocomplete="off" onchange="validationID()">
                            <p id="idError" style="display:none; font-size:18px;">*خطأ فى الرقم القومى</p>
                            <p id="errror" style="color:red; font-size:18px;"></p>
                        </div>

                        <div id="fnational" class="mb-3 col-4 border-right border-left" style="display:none;">
                            <label for="FnationalId" class="form-label">رقم جواز السفر :</label>
                            <input type="text" class="form-control w-75" name="FnationalId" id="FnationalId"
                                maxlength="15" autocomplete="off">
                        </div>
                        <div id="fcountry" class="mb-3 col-3 border-right border-left" style="display:none;">
                            <label for="country" class="form-label">بلد الجنسية :</label>
                            <select name="country" id="country" class="form-select w-75 form-control" style="font-size:14px;">
                                <option value=" " selected>--اختر بلد الجنسية--</option>
                                <?php
       require_once '../connection.php';
       $query= "select * from country";
       $do= mysqli_query($conn,$query)or die('error'.mysqli_error($conn));
       while($row=mysqli_fetch_array($do)){
      echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
       }
       ?>
                            </select>
                        </div>
                        <div class="mb-3 col-5 border-right ">
                            <label for="uname" class="form-label">الاسم (كما هو مدون بالبطاقة أو وثيقة السفر)</label>
                            <input type="text" class="form-control" name="uname" id="uname" maxlength="50"
                                autocomplete="off" onfocus="checkage()" onkeypress="return CheckArabicCharactersOnly(event);" required>

                        </div>

                    </div>



                    <div class="row">
                        <div class="mb-3 col-4 border-right border-left">
                            <label for="marriageAddress" class="form-label">عنوان سكن الزوجية :</label>
                            <input type="text" class="form-control" name="marriageAddress" id="marriageAddress"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-5 border-right ">
                            <label for="address" class="form-label">العنوان بالبطاقة :</label>
                            <input type="text" class="form-control " name="address" id="address" autocomplete="off"
                                required>
                        </div>
                        
                    </div>


                    

                </div>
                <hr>
          </section>
    </form>
    
    
    
    
    
    
    
    
    
    
    
    
    
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