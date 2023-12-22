        <!-- php for top html - inc_header.php  -->
        <?php

            $page_id = 2;
            include "inc_header.php";

            $show_regform = FALSE;
            $msg="";

            if(isset($_POST['sent']) && $_POST['sent']=="REGISTER"){
                $show_regform = TRUE;

                // user name validation
                $_POST['uname'] = htmlspecialchars(trim($_POST['uname']),ENT_QUOTES,'UTF-8');
                if(empty($_POST['uname'])) $msg.="your name cannot be empty</br>";
                


                // password validation
                if(empty($_POST['passwd1']) || empty($_POST['passwd2'])) $msg.="password cannot be empty</br>";
                elseif($_POST['passwd1']!=$_POST['passwd2']) $msg.="password do not match</br>";

                // email validation 
                $_POST['email']=trim($_POST['email']);
                if(empty($_POST['email'])) $msg.="Email cannot be empty</br>";
                elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) $msg.="Email is not valid </br>";

                // db operations
                if($msg=""){
                    $db = new PDO('mysql:host=localhost;contactbook','root','kavik');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

                    // insert user
                    $pwd = password_hash($_POST['passwd1'],PASSWORD_DEFAULT);   
                    $ok = $db->prepare("INSERT INTO `users`(`name`,`email`,`password`) VALUES (?,?,?)")->execute(array($_POST['uname'],$_POST['email'],$pwd));

                    if($ok) header("location:login.php?registered=1");
                    else $msg.="something is wrong! please contact website admin</br>";
                }

            }

        ?>
    
        <title>login/registation</title>
        <style>

            /* error msg */
            #msg{
                display: none;
                padding: 5px 0;
                margin: 5px 0;
                min-height: 30px;
                width: 100%;
                text-align: center;
            }
            .err{
                background: #d11919;
                color: #fff;
            }
            .okmsg{
                padding: 5px 0;
                margin: 5px 0;
                min-height: 30px;
                width: 100%;
                text-align: center;
                background: #459e19;
                color: #fff;
            }

            <?php
                if($show_regform)
                    echo "#reg{display:block}#log{display:none}";
                else
                    echo "#reg{display:none}";

                if($msg!="")    
                    echo "#msg{display:block}";
            ?>

            /* css code  */

            /* headder */
            h2{
                color: #fff;
                text-transform: uppercase;
                font-size: 1.2em;
            }
            /* form  */
            form{
                width: 500px;
                box-shadow: 0 0 3px #000;
                overflow: hidden;
                padding: 50px 20px;
            }.wrap{
                width: 540px;
                margin: 10px auto;
            }
            .item{
                width: 40%;
                display: block;
                float: left;
                color: #fff;
                padding: 5px 0;
            }
            .row{
                width: 100%;
                float: left;
                font-size: 1.1em;
                margin-bottom: 5px;
            }
            .in1{
                width: 57%;
                padding: 5px 1%;
                background: #EBE5E5;
                border: 1px solid #ccc;
                font-size: 1.1em;
                font-family: 'Open Sans', sans-serif;
            }
            .in2{
                width: 99%;
                background: #f38918;;
                color: #000;
                font-family: 'Open Sans', sans-serif;
                font-size: 1.1em;
                border: 0;
                padding: 10px 0;
                margin: 20px .5% 0;
                box-shadow: 0 0 3px #000;
            }
            .in2:hover{
                background: #F27609;
            }
            .link{
                color: #F27609;
                margin: 10px 0;
                cursor: pointer;
            }

            

            /* media queries*/

            @media screen and (max-width:580px) {
                .wrap{
                    width: 96%;
                    margin: 10px 2%;

                }
                form{
                    width: 96%;
                    padding: 50px 2%;
                }
            }

            @media screen and (max-width:445px) {
                form{
                    padding: 15px 2%;
                }
                .item{
                    width: 100%;
                }
                .in1{
                    width: 96%;
                }
            }

            @media screen and (max-width:320px) {
                .wrap{
                    width: 310px;
                    margin: 10px 5px;
                }
            }

        </style>
    </head>

    <body>
        <main>
        <!-- html code  -->
        <header>
            <h1>contact box</h1>
        </header>

        <?php
            if(isset($_GET['registered']) && $_GET['registered']==1)
                echo "<div id='okmsg'>You have registerd succesfully.</div>";
        ?>

        <div id="msg" class="err">
            <?php
                if($msg!="")
                    echo $msg;
            ?>
        </div>
        <div class="wrap" id="log">
            <h2>login</h2>
            
            <form onsubmit="return validateLogin()" name="loginform" method="post">
                <label class="row">
                    <span class="item">Email</span>
                    <input type="email" class="in1" required name="email">
                </label>
                <label class="row">
                    <span class="item">Password</span>
                    <input type="password" class="in1" required name="passwd">
                </label>
                <div class="row">
                    <input type="submit" value="LOGIN" class="in2">
                </div>
            </form>
            <div class="link" onclick="show('reg')">Don't you have an account?Register</div>
        </div>
        <div class="wrap" id="reg">
            <h2>register</h2>
            <form onsubmit="return validateRegister()" name="registerform" method="post">
                <label class="row">
                    <span class="item">your name</span>
                    <input type="text" class="in1"  required name="uname" maxlength="20" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>" >
                </label>
                <label class="row">
                    <span class="item">Email</span>
                    <input type="email" class="in1" required name="email" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                </label>
                <label class="row">
                    <span class="item">Password</span>
                    <input type="password" class="in1" required name="passwd1" maxlength="50">
                </label>
                <label class="row">
                    <span class="item">re - enter Password</span>
                    <input type="password" class="in1" required name="passwd2" maxlength="50">
                </label>
                <div class="row">
                    <input type="submit" value="REGISTER" name="sent" class="in2">
                </div>
            </form>
            <div class="link" onclick="show('log')">Do you already have an account?Login</div>
        </div>

        <!-- java script code -->
        <script>
            function show(v){
                if(v=="log"){
                    document.getElementById('reg').style.display="none";
                    document.getElementById('log').style.display="block";
                }
                else{
                    document.getElementById('log').style.display='none';
                    document.getElementById('reg').style.display='block';
                }
            }

            // validate login form
            function validateLogin(){

                var msg = "";
                // email validation
                var email = document.forms["loginform"]["email"].value;

                var at_symbol = email.indexOf("@");
                var last_dot = email.lastIndexOf(".");

                if(last_dot<at_symbol) msg += "Email is Invalid </br>";

                // display massege alert 
                if(msg!==""){
                    document.getElementById("msg").style.display = "block";
                    document.getElementById("msg").innerHTML = msg;
                    return false;
                }
            }

            // validate registation  form
            function validateRegister(){

                var msg = "";
                // email validation
                var email = document.forms["registerform"]["email"].value;

                var at_symbol = email.indexOf("@");
                var last_dot = email.lastIndexOf(".");

                if(last_dot<at_symbol) msg += "Email is Invalid </br>";

                // password validation
                var pwd1 = document.forms["registerform"]["passwd1"].value;
                var pwd2 = document.forms["registerform"]["passwd2"].value;

                if(pwd1!==pwd2){
                    msg += "Password Does not match with confirm passwd </br>";
                }

                // user name 
                var user_name = document.forms["registerform"]["uname"].value;
                if(user_name.trim()=="") msg += "Name is Invalid</br>";

                // display massege alert 
                if(msg!==""){
                    document.getElementById("msg").style.display = "block";
                    document.getElementById("msg").innerHTML = msg;
                    return false;
                }
            }
            </script>
            <!-- php footer -->
            <?php
                include "inc_footer.php" ;
            ?>