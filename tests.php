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
  <body style="background-color:#eeeeee; overflow-x: hidden; overflow-y:scroll;">
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
          <li class="breadcrumb-item active text-dark" aria-current="page">نتائج الفحوصات</li>
        </ol>
      </div>
      <?php
if(isset($_POST['submit'])){
  $id = $_POST['id_mother'];
  $insert = "select * from hearing_disorders_child where mother_nid = '$id'";
$query= pg_query($conn,$insert) or die("error:".pg_last_error($conn));
$result=pg_fetch_array($query);
if(pg_num_rows($query) > 0){
    $child_id = $result['id'];
    echo $child_id;  
    
$insert1 = "select * from hearing_disorders_child_result where child_id = '$child_id'";
$query1 = pg_query($conn,$insert1) or die("error:".pg_last_error($conn));
$result1 = pg_fetch_array($query1);

  ?>
  <form method="post" action="register.php">
<input name="id_mother" value="<?php echo $result['id'] ?>" style="display:none;">
  <!-- Start testing displaying  -->
  <div class="container text-right" style=" border:#000428 solid 2px;">
      <br>
      <div class="row align-items-start">
          <div class="col-4 mb-4">
            <div class="badge  text-wrap" style="width: 16rem; font-size: 20px; color:white; background-image: linear-gradient(to right, #000428, #004e92); ">
          نتائج الفحوصات السابقة : 
            </div>                   
          </div>
      </div>  
      <div class="row">
       <div class="col-2 mb-3 mt-4">
          <h4  class="form-label">الأذُن اليمني :</h4>
        </div>
        <div class="col-2 mb-3">
          <label for="ABR_R" class="form-label">ABR</label>
<span class="d-block p-2 bg-white text-dark"  id="ABR_R">
    <?php 
      if(isset($result1["ABR_r"]))
      {
          echo "1";
      }
    else
  { 
        echo $result1["ABR_r"];}?>
            </span>
        </div>
        <div class="col-2 mb-3">
          <label for="Tympanometry_R" class="form-label">Tympanometry</label>
          <span class="d-block p-2 bg-white text-dark"  id="Tympanometry_R"><?php echo $result1["Tympanometry_r"];?></span>
        </div>   
        <div class="col-2 mb-3">
          <label for="OAE_R" class="form-label">OAE</label>
          <span class="d-block p-2 bg-white text-dark"  id="OAE_R"><?php echo $result1["OAE_r"];?></span>
        </div> 
        <div class="col-2 mb-3">
          <label for="Decision_R" class="form-label">Decision</label>
          <span class="d-block p-2 bg-white text-dark"  id="Decision_R"><?php echo $result1["Decision_r"];?></span>
        </div> 
      </div>
      <div class="row">
           <div class="col-2 mb-3 mt-4">
          <h4  class="form-label">الأذُن اليسري :</h4>
        </div>
      <div class="col-2 mb-3">
          <label for="ABR_L" class="form-label">ABR</label>
          <span class="d-block p-2 bg-white text-dark"  id="ABR_L"><?php echo $result1["ABR_l"];?></span>
        </div> 
      <div class="col-2 mb-3">
          <label for="Tympanometry_L" class="form-label">Tympanometry</label>
          <span class="d-block p-2 bg-white text-dark " id="Tympanometry_L"><?php echo $result1["tympanometry_l"];?></span>
        </div>
        <div class="col-2 mb-3">
          <label for="OAE_L" class="form-label">OAE</label>
          <span class="d-block p-2 bg-white text-dark "  id="OAE_L"><?php echo $result1["OAE_L"];?></span>
        </div>
        <div class="col-2 mb-3">
          <label for="Decision_L" class="form-label">Decision</label>
          <span class="d-block p-2 bg-white text-dark "  id="Decision_L"><?php echo $result1["Decision_L"];?></span>
        </div>   
      </div>
      <div class="row mt-4">
       <div class="col-2 mb-3 mt-2">
           
           <h4  class="form-label">التاريخ :</h4>
        </div>
        <div class="col-2 mb-3">
          <span class="d-block p-2 bg-white text-dark" id="ABR_R"><?php echo $result1["ABR_Date"];?></span>
        </div>
      
        <div class="col-2 mb-3">
          <span class="d-block p-2 bg-white text-dark" id="Tympanometry_R"><?php echo $result1["Tymp_Date"];?></span>
        </div>   
      
        <div class="col-2 mb-3">
          <span class="d-block p-2 bg-white text-dark" id="OAE_R"><?php echo $result1["OAE_Date"];?></span>
        </div> 
        <div class="col-2 mb-3">
          <span class="d-block p-2 bg-white text-dark" id="Decision_R"><?php echo $result1["Decision_Date"];?></span>
        </div> 
      </div>
      <br>
    </div>
  <!-- End testing Dispalying    -->
  <br><br>
  <div class="row"></div>
      <div class="container text-right" style=" border:#000428 solid 2px;" >
        <div class="row">
          <div class="col-8" >
            <div class="row align-items-start">
              <div class="col-2">
                <br>
                <div class="badge text-wrap" style="width: 8rem; font-size: 20px; color:white; background-image: linear-gradient(to right, #000428, #004e92); ">
                  الأذُن اليمني
                </div> 
              </div>
            </div>  
                  <br>
                  <div class="row">
                    <div class="col-4">
                      <div class="badge text-wrap" style="width: 6rem; font-size: 15px;">
                        ABR
                      </div> 
                    </div>
                    <div class="col-4">
                      <div class="badge  text-wrap" style="width: 8rem; font-size: 15px;">
                        Tympanometry
                      </div> 
                    </div>
                    <div class="col-4"> 
                      <div class="badge  text-wrap" style="width: 6rem; font-size: 15px;">
                        OAE
                      </div> 
                    </div> 
                  </div>
                  <br>
                  <div class="row align-items-start">
                    <div class="col-4"> 
                      <select class="form-select form-control" aria-label="Default select example" id="ABRR" name="ABRR">
                        <option value="not">--اختر--</option>
                        <option value="Moderate Hearing loss"> Moderate Hearing loss</option>
                        <option value="Moderate to sever hearing loss">Moderate to sever hearing loss</option>
                        <option value="Mild hearing loss">Mild hearing loss</option>
                        <option value="Sever hearing loss">Sever hearing loss</option>
                        <option value="Profoud hearing loss">Profoud hearing loss</option>
                      </select> 
                    </div>
                    <div class="col-4"> 
                      <select class="form-select form-control" aria-label="Default select example" id="TympanometryR" name="TympanometryR">
                        <option value="not">--اختر--</option>
                        <option value="Type A">Type A</option>
                        <option value="Type B">Type B</option>
                        <option value="Type C">Type C</option>
                        <option value="other">other</option>
                      </select> 
                    </div>
                    <div class="col-4"> 
                      <select class="form-select form-control" aria-label="Default select example"  id="OAER" name="OAER">
                        <option value="not">--اختر--</option>
                        <option value="Pass">Pass</option>
                        <option value="Failed">Failed</option>
                        <option value="Partial pass">Partial pass</option>
                      </select> 
                    </div>
                  </div>
                  <br>
                  <div class="row align-items-start">
                    <div class="col-2">
                      <div class="badge bg-primary text-wrap" style="width: 8rem; font-size: 20px; color:white; background-image: linear-gradient(to right, #000428, #004e92); ">
                        الأذُن اليسري
                      </div> 
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-4">
                      <div class="badge  text-wrap" style="width: 6rem; font-size: 15px;">
                        ABR
                      </div> 
                    </div>
                    <div class="col-4">
                      <div class="badge  text-wrap" style="width: 8rem; font-size: 15px;">
                        Tympanometry
                      </div> 
                    </div>
                    <div class="col-4"> 
                      <div class="badge  text-wrap" style="width: 6rem; font-size: 15px;">
                        OAE
                      </div> 
                    </div> 
                  </div>
  
                  <br>
  
                  <div class="row align-items-start">
                    <div class="col-4"> 
                      <select class="form-select form-control" aria-label="Default select example" id="ABRL" name="ABRL">
                        <option value="not">--اختر--</option>
                        <option value="Moderate Hearing loss"> Moderate Hearing loss</option>
                        <option value="Moderate to sever hearing loss">Moderate to sever hearing loss</option>
                        <option value="Mild hearing loss">Mild hearing loss</option>
                        <option value="Sever hearing loss">Sever hearing loss</option>
                        <option value="Profoud hearing loss">Profoud hearing loss</option>
                      </select> 
                    </div>
                    <div class="col-4"> 
                      <select class="form-select form-control" aria-label="Default select example" id="TympanometryL" name="TympanometryL">
                        <option value="not">--اختر--</option>
                        <option value="Type A">Type A</option>
                        <option value="Type B">Type B</option>
                        <option value="Type C">Type C</option>
                        <option value="other">other</option>
                      </select> 
                    </div>
                    <div class="col-4"> 
                      <select class="form-select form-control" aria-label="Default select example" id="OAEL" name="OAEL">
                        <option value="not">--اختر--</option>
                        <option value="Pass">Pass</option>
                        <option value="Failed">Failed</option>
                        <option value="Partial pass">Partial pass</option>
                      </select> 
                    </div>
                  </div>
            </div>
                  <!--   ___________________________________________________________________   -->
          </div>
                <br>
        </div>
            <br>
      </div>
        <br><br> 
    </div>
    <div class="container" style=" border:#000428 solid 2px;">
      <div class="row align-items-start">
                    <div class="col-2">
                      <div class="badge bg-primary text-wrap mt-3" style="width: 8rem; font-size: 20px; color:white; background-image: linear-gradient(to right, #000428, #004e92); ">
                        Decision
                      </div> 
                    </div>
                  </div>
        <div class="row">
        <div class="col-8">
          <div class="row">
            <div class="col-4">
              <div class="badge  text-wrap" style="width: 10rem; font-size: 25px;">
              الأذُن اليمني
              </div>
            </div>
            <div class="col-4">
              <div class="badge  text-wrap" style="width: 10rem; font-size: 25px;">
              الأذُن اليسري
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            
            <div class="col-4">
              <select class="form-select form-control" aria-label="Default select example" name='dec-r'>
                <option value="not">--اختر--</option>
                <option value="Normal">Normal</option>
                <option value="Surgical treatment">Surgical treatment</option>
                <option value="Follow-up and retest">Follow-up and retest</option>
                <option value="Medical treatment">Medical treatment</option>
                <option value="Hearing aid">Hearing aid</option>
              </select>
            </div>
            <div class="col-4">
              <select class="form-select form-control" aria-label="Default select example" name='dec-l'>
                <option value="not">--اختر--</option>
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
    <div class="container" dir="rtl" style=" border:#000428 solid 2px;">
      <br>
      <div class="row">
        
        <div class="col-3"></div>
        <div class="col-4">
          
            <button type="submit" name="submit" class="btn loginButton" style="width: 8rem;"> ادخال </button>
          
        </div>
        <div class="col-3">
          
            <button type="submit" name="close" onclick="index.php" class="btn backButton" style="width: 8rem;"> اغلاق </button>
          </form>
        </div>
        
      </div>
      <br>
    </div>
  </form>

<?php
}
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