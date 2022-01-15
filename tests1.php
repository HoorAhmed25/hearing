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
          <li class="breadcrumb-item active text-dark" aria-current="page">نتائج الكشف</li>
        </ol>
      </div>


    <!-- Start testing displaying  -->
    <div class="container" style="height: 100%; border:blue solid 2px;">
        <br>
        <div class="row align-items-start">
            <div class="col-4">
              <div class="badge bg-primary text-wrap" style="width: 16rem; font-size: 20px;">
                Results of Old tests:
              </div>                   
            </div>
        </div>  
        <div class="row">
        
          <br>
          <div class="col-4 mb-3">
            <label for="ABR_R" class="form-label">ABR_R</label>
            <span class="d-block p-2 bg-danger text-white" style="width: 16rem;" id="ABR_R"><?php echo $_SESSION["ABR_r"];?></span>
          </div>
          <div class="col-4 mb-3">
            <label for="Tympanometry_R" class="form-label">Tympanometry_R</label>
            <span class="d-block p-2 bg-danger text-white" style="width: 16rem;" id="Tympanometry_R"><?php echo $_SESSION["Tympanometry_r"];?></span>
          </div>   
          <div class="col-4 mb-3">
            <label for="OAE_R" class="form-label">OAE_R</label>
            <span class="d-block p-2 bg-danger text-white" style="width: 16rem;" id="OAE_R"><?php echo $_SESSION["OAE_r"];?></span>
          </div> 
        </div>
        <div class="row">
        <div class="col-4 mb-3">
            <label for="ABR_L" class="form-label">ABR_L</label>
            <span class="d-block p-2 bg-danger text-white" style="width: 16rem;" id="ABR_L"><?php echo $_SESSION["ABR_L"];?></span>
          </div> 
        <div class="col-4 mb-3">
            <label for="Tympanometry_L" class="form-label">Tympanometry_L</label>
            <span class="d-block p-2 bg-danger text-white" style="width: 16rem;" id="Tympanometry_L"><?php echo $_SESSION["Tympanometry_L"];?></span>
          </div>
          <div class="col-4 mb-3">
            <label for="OAE_L" class="form-label">OAE_L</label>
            <span class="d-block p-2 bg-danger text-white" style="width: 16rem;" id="OAE_L"><?php echo $_SESSION["OAE_L"];?></span>
          </div>   
        </div>
        <div class="row">
        
          <br>
          <hr>
          <div class="col-2 mb-3">
            <span class="d-block p-2 bg-danger text-white" id="ABR_R">Date:<?php echo $_SESSION["ABR_Date"];?></span>
          </div>
          <div class="col-2 mb-3">
            
          </div> 
          <div class="col-2 mb-3">
            <span class="d-block p-2 bg-danger text-white" id="Tympanometry_R">Date:<?php echo $_SESSION["Tymp_Date"];?></span>
          </div>   
          <div class="col-2 mb-3">
            
          </div>
          <div class="col-2 mb-3">
            <span class="d-block p-2 bg-danger text-white" id="OAE_R">Date:<?php echo $_SESSION["OAE_Date"];?></span>
          </div> 
          <div class="col-2 mb-3">
           
          </div>   
        </div>
        <br>
      </div>
    <!-- End testing Dispalying    -->
    <br><br>
    <div class="row"></div>
        <div class="container" style="height: 100%; border:blue solid 2px;" >
          <div class="row">
            <div class="col-4 ">
              <img src="login_form.PNG" alt="login form" width="100%" style="height: 100%;" >
            </div>
            <div class="col-8" >
              <div class="row align-items-start">
                <div class="col-2">
                  <br>
                  <div class="badge bg-primary text-wrap" style="width: 8rem; font-size: 20px;">
                    Right Ear
                  </div> 
                </div>
              </div>  
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="badge bg-danger text-wrap" style="width: 6rem; font-size: 15px;">
                          ABR
                        </div> 
                      </div>
                      <div class="col-4">
                        <div class="badge bg-danger text-wrap" style="width: 8rem; font-size: 15px;">
                          Tympanometry
                        </div> 
                      </div>
                      <div class="col-4"> 
                        <div class="badge bg-danger text-wrap" style="width: 6rem; font-size: 15px;">
                          OAE
                        </div> 
                      </div> 
                    </div>
                    <br>
                    <div class="row align-items-start">
                      <div class="col-4"> 
                        <select class="form-select" aria-label="Default select example" id="ABRR" name="ABRR">
                          <option value="not">Open this select menu</option>
                          <option value="Moderate Hearing loss"> Moderate Hearing loss</option>
                          <option value="Moderate to sever hearing loss">Moderate to sever hearing loss</option>
                          <option value="Mild hearing loss">Mild hearing loss</option>
                          <option value="Sever hearing loss">Sever hearing loss</option>
                          <option value="Profoud hearing loss">Profoud hearing loss</option>
                        </select> 
                      </div>
                      <div class="col-4"> 
                        <select class="form-select" aria-label="Default select example" id="TympanometryR" name="TympanometryR">
                          <option value="not">Open this select menu</option>
                          <option value="Type A">Type A</option>
                          <option value="Type B">Type B</option>
                          <option value="Type C">Type C</option>
                          <option value="N/A">N/A</option>
                        </select> 
                      </div>
                      <div class="col-4"> 
                        <select class="form-select" aria-label="Default select example"  id="OAER" name="OAER">
                          <option value="not">Open this select menu</option>
                          <option value="Pass">Pass</option>
                          <option value="Failed">Failed</option>
                          <option value="Partial pass">Partial pass</option>
                        </select> 
                      </div>
                    </div>
                    <br>
                    <div class="row align-items-start">
                      <div class="col-2">
                        <div class="badge bg-primary text-wrap" style="width: 8rem; font-size: 20px;">
                          Left Ear
                        </div> 
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="badge bg-danger text-wrap" style="width: 6rem; font-size: 15px;">
                          ABR
                        </div> 
                      </div>
                      <div class="col-4">
                        <div class="badge bg-danger text-wrap" style="width: 8rem; font-size: 15px;">
                          Tympanometry
                        </div> 
                      </div>
                      <div class="col-4"> 
                        <div class="badge bg-danger text-wrap" style="width: 6rem; font-size: 15px;">
                          OAE
                        </div> 
                      </div> 
                    </div>
    
                    <br>
    
                    <div class="row align-items-start">
                      <div class="col-4"> 
                        <select class="form-select" aria-label="Default select example" id="ABRL" name="ABRL">
                          <option value="not">Open this select menu</option>
                          <option value="Moderate Hearing loss"> Moderate Hearing loss</option>
                          <option value="Moderate to sever hearing loss">Moderate to sever hearing loss</option>
                          <option value="Mild hearing loss">Mild hearing loss</option>
                          <option value="Sever hearing loss">Sever hearing loss</option>
                          <option value="Profoud hearing loss">Profoud hearing loss</option>
                        </select> 
                      </div>
                      <div class="col-4"> 
                        <select class="form-select" aria-label="Default select example" id="TympanometryL" name="TympanometryL">
                          <option value="not">Open this select menu</option>
                          <option value="Type A">Type A</option>
                          <option value="Type B">Type B</option>
                          <option value="Type C">Type C</option>
                          <option value="N/A">N/A</option>
                        </select> 
                      </div>
                      <div class="col-4"> 
                        <select class="form-select" aria-label="Default select example" id="OAEL" name="OAEL">
                          <option value="not">Open this select menu</option>
                          <option value="Pass">Pass</option>
                          <option value="Failed">Failed</option>
                          <option value="Partial pass">Partial pass</option>
                        </select> 
                      </div>
                    </div>
              </div>
                    
            </div>
                  <br>
          </div>
              <br>
 
      <div class="container" style="height: 100%; border:blue solid 2px;">
        <br>
        <div class="row">
          <div class="col-4">
            <div class="badge bg-primary text-wrap" style="width: 20rem; font-size: 30px;">
              Decision
            </div>
          </div>
          <div class="col-8">
            <div class="row">
              <div class="col-4">
                <div class="badge bg-danger text-wrap" style="width: 10rem; font-size: 25px;">
                  Right Ear
                </div>
              </div>
              <div class="col-4">
                <div class="badge bg-danger text-wrap" style="width: 10rem; font-size: 25px;">
                  Left Ear
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              
              <div class="col-4">
                <select class="form-select" aria-label="Default select example" name='dec-r'>
                  <option value="not">Open this select menu</option>
                  <option value="Normal">Normal</option>
                  <option value="Surgical treatment">Surgical treatment</option>
                  <option value="Follow-up and retest">Follow-up and retest</option>
                  <option value="Medical treatment">Medical treatment</option>
                  <option value="Hearing aid">Hearing aid</option>
                </select>
              </div>
              <div class="col-4">
                <select class="form-select" aria-label="Default select example" name='dec-l'>
                  <option value="not">Open this select menu</option>
                  <option value="Normal">Normal</option>
                  <option value="Surgical treatment">Surgical treatment</option>
                  <option value="Follow-up and retest">Follow-up and retest</option>
                  <option value="Medical treatment">Medical treatment</option>
                  <option value="Hearing aid">Hearing aid</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <br>
      </div>
  <br><br>
      <div class="container" dir="rtl" style="height: 100%; border:blue solid 2px;">
        <br>
        <div class="row">
          
          <div class="col-3"></div>
          <div class="col-4">
            
              <button type="submit" name="submit" class="btn btn-primary btn-lg" style="width: 8rem;"> ادخال </button>
            
          </div>
          <div class="col-3">
            
              <button type="submit" name="close" onclick="index.php" class="btn btn-danger btn-lg" style="width: 8rem;"> اغلاق </button>
            </form>
          </div>
          
        </div>
        <br>
      </div>
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