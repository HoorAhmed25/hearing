<?php  session_start(); ?><html dir="rtl">

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

    .leftD {
        width: 25%;
    }

    .rightD {
        width: 30%
    }

    .centerD {
        width: 45%;
    }

    @media screen and (max-width: 1000px) {

        .leftD,
        .mainD,
        .rightD {
            width: 80%;
            /* The width is 100%, when the viewport is 800px or smaller */
        }
    }

    /* Use a media query to add a break point at 800px: */
    @media screen and (max-width: 800px) {

        .leftD,
        .mainD,
        .rightD {
            width: 100%;
            /* The width is 100%, when the viewport is 800px or smaller */
        }
    }
.card-body{
    width: 350px;
	margin-top: 50px;
    border-radius: 20px;
	box-shadow: 3px 4px #888888;
	background-color: white;
	height: 400px;
	padding-top: 50px;
	margin: auto;
    margin-top: 100px; !important
    transition: 0.5s;
}
.card-body:hover{
	background-color: white;
	height: 400px;
	padding-top: 50px;
	border-radius: 20px;
	box-shadow: 5px 6px 5px 6px #888888;
}
           .loginButton{
   background-image: linear-gradient(to right, #000428, #004e92); 
    margin-top: 10px;
        padding-left: 50px;
               padding-right: 50px;
}
.loginButton:hover{
    background-color: #004e92;  
    margin-top: 10px;
    
 
}

    </style>
</head>

<body style="background-color:#eeeeee; overflow-x: hidden; overflow-y:scroll;">
    <nav>
        <div class="row">
            <div class="col-1"><img src="img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid"
                    style="height:75px;  margin-top:5px;" /></div>
            <div class="col-2">
                <h6 class="text-white d-inline" style=" font-weight: bold;"><br>جمهورية مصر العربية <br>وزارة الصحة و
                    السكان </h6>
            </div>
            <div class="col-5"></div>
            <div class="col-3 pt-1"><img src="img/100million.png" class="img-fluid" style="height:80px;" /></div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="leftD" style=" padding-top:90px;"><img src="img/sisi.png" style="width:430px; height:420px;">
            </div>
            <div class="container centerD">
                <div class="card-body container WOW fadeIn text-center" style="padding-top:50px; width:400px;">
                    <h3> مبادرة رئيس الجمهورية<br> للاكتشاف المبكر و علاج ضعف و فقدان السمع للأطفال حديثي الولادة</h3>
                    <form name="login" action="" method="POST">
                        <div class="form-group pt-3"><input name="user" type="text" class="form-control"
                                placeholder="اسم المستخدم" required><br><input name="password" type="password"
                                class="form-control" placeholder="**********" required><br><button
                                class="btn btn-lg text-white loginButton" type="submit" name="login">دخول</button></div>
                    </form>
                </div>
            </div>
           
        </div>
</div>
      <?php
          require_once "connection.php";
         if(isset($_POST['login'])){
              $user = $_POST['user'];
              $password = $_POST['password'];
              $stmt = "SELECT * FROM res_users WHERE username='$user' and pass='$password' limit 1";
              $query=pg_query($conn, $stmt) or die("error:".pg_last_error());
             $result=pg_fetch_array($query);
             $_SESSION['user']=$user;
             $_SESSION['hospital']= $result['hospital'];
             $_SESSION['userLogin']="Loggedin";
                  if(pg_num_rows($query)== 1){  
                      echo '<script type="text/javascript">';
                echo'window.location.href="steps.php";';
                echo '</script>';   
                  }
                  else{
                      $error = "username or password didn't match";?>
                      <div class="row">
                        <div class="col-4 badge bg-danger text-wrap  fs-5" style="width: 25rem;">
                        <?php echo $error; ?>
                        </div>
                      </div>
                      <?php 

                  }    
          }
        

        ?>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="js/mine.js"></script>
</body>

</html>


