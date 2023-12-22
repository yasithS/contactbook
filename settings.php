        <!-- php for top html - inc_header.php  -->
        <?php
            $page_id = 7;
            include "inc_header.php" ;
            $msg = "";
            $password_change = FALSE;

            try{
                // connect to db
                include "db_connection.php";

                if(isset($_POST['sent'])){

                // user name validation
                $_POST['uname'] = htmlspecialchars(trim($_POST['uname']),ENT_QUOTES,'UTF-8');
                if(empty($_POST['uname'])) $msg.="your name cannot be empty</br>";

                // email validation 
                $_POST['email']=trim($_POST['email']);
                if(empty($_POST['email'])) $msg.="Email cannot be empty</br>";
                elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) $msg.="Email is not valid</br>";

                // password validation
                if(!empty($_POST['passwd0']) || !empty($_POST['passwd1']) || !empty($_POST['passwd2'])){
                    if(empty($_POST['passwd0'])) $msg.="old password cannot be empty<br>";
                    if(empty($_POST['passwd1']) || empty($_POST['passwd2'])) $msg.="new passwords cannot be empty<br>";
                    elseif($_POST['passwd1'] !=$_POST['passwd2']) $msg.="new passwords do not match<br>";
                    else{$password_change = TRUE;}
                }
                
                if(empty($msg)){
                    
                    $query = "UPDATE `users` SET `name`=? , `email`=? ";
                    $query_array = array($_POST['uname'],$_POST['email']);
                    
                    // set new password
                    if($password_change){
                        $check = $db->prepare("SELECT `password` FROM `users` WHERE `id`=?");
                        $check->execute(array($_SESSION['id']));
                        if($check->rowCount()>0){
                            if($result=$check->fetch()){

                                //old password verification
                                if(password_verify($_POST['passwd0'],$result['password'])){
                                    $query.=", `password`=?";
                                    array_push($query_array,password_hash($_POST['passwd1'],PASSWORD_DEFAULT));
                                }else $msg.="old password entered is wrong<br>";
                            }
                        }
                    }
                    $query.=" WHERE `id`=?";
                    array_push($query_array,$_SESSION['id']);
                    if(empty($msg)){
                        $ok = $db->prepare($query)->execute($query_array);
                        if($ok){
                            $okmsg = "your account has been updated successfuly";
                            $_SESSION['name']=$_POST['uname'];
                        }
                    }   
                }
                
                }else{  
                    $get_data = $db->prepare("SELECT `name`, `email` FROM `users` WHERE `id`=?");
                    $get_data->execute(array($_SESSION['id']));
                    $data=$get_data->fetch();

                }
            }
            catch(PDOException $e){
                $msg.=$e->getMessage();
            }
            
        ?>

        <title>settings</title>
        <style>
            /* css code  */

            /* main section  */
            form{
                width: 50%;
            }
            .in1{
                background: #ebe5e5;
                border: 1px solid #ccc;
                padding: 5px 1%;
                font-size: 1.1em;
                font-family: 'Open Sans', sans-serif;
                width: 53%;
            }
            .in2{
                width: 49%;
                float: left;
                background: #f38918;
                padding: 10px 0;
                margin: 10px .5%;
                border: 0;
                font-size: 1.1em;
                font-family: 'Open Sans', sans-serif;
                color: #000;
                box-shadow: 0 0 3px #000;
            }
            .in2:hover{
                background: #F27609;
            }
            .row{
                width: 100%;
                float: left;
                margin-bottom: 5px ;
            }
            .item{
                width: 40%;
                float: left;
                font-size: 1.1em;
            }

            #msg, #okmsg{
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
            #okmsg{
                background: #229205;
                color: #fff;
            }

            <?php if(!empty($msg)) echo '#msg{display: block;}'; ?>
            <?php if(isset($okmsg)) echo '#okmsg{display: block;}'; ?>

            /* media queries*/

            @media screen and (max-width:800px) {
                form{
                    width: 100%;
                }
            }

            @media screen and (max-width:440px) {
                .in1{
                    width: 98%;
                }
                .item{
                    width: 100%;
                }
                .gender{
                    width: 45%;
                }
                select{
                    width: 100%;
                }
                .row{
                    margin-bottom: 20px;
                }
            }
            
        </style>
    
    <!-- php menus  -->
    <?php 
        include "inc_menus.php" 
    ?>
        
        <div id="msg" class="err"><?php if(!empty($msg)) echo $msg; ?></div>
        <div id="okmsg"><?php if(isset($okmsg)) echo $okmsg; ?></div>
        <form onsubmit="return validate()" name="form1" method="post">
                <label class="row">
                    <span class="item">your name</span>
                    <input type="text" class="in1" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];
                    else echo $data['name']; ?>" name="uname" required>
                </label>
                <label class="row">
                    <span class="item">Email</span>
                    <input type="email" class="in1" value="<?php if(isset($_POST['email'])) echo $_POST['email'];
                    else echo $data['email']; ?>" name="email" required >
                </label>
                <label class="row">
                    <span class="item">Old Password</span>
                    <input type="password" class="in1" name="passwd0">
                </label>
                <label class="row">
                    <span class="item">New Password</span>
                    <input type="password" class="in1" name="passwd1">
                </label>
                <label class="row">
                    <span class="item">Re - Enter Password</span>
                    <input type="password" class="in1" name="passwd2">
                </label>
                <div class="row">
                    <input type="submit" value="UPDATE" class="in2" name="sent">
                    <input type="reset" value="CANCEL" class="in2">
                </div>
            </form>
            
    <script>    
        // validate registation  form
        function validate(){

            var msg = "";
            // email validation
            var email = document.forms["form1"]["email"].value;

            var at_symbol = email.indexOf("@");
            var last_dot = email.lastIndexOf(".");

            if(last_dot<at_symbol) msg += "Email is Invalid </br>";

            // password validation
            var pwd0 = document.forms["form1"]["passwd0"].value;
            var pwd1 = document.forms["form1"]["passwd1"].value;
            var pwd2 = document.forms["form1"]["passwd2"].value;

            if(pwd1!==pwd2){
                msg += "Password Does not match with confirm passwd </br>";
            }
            else if(pwd1.length>0 && pwd0.length==0){
                msg += "old password Required to change your password </br>";
            }

            // user name 
            var user_name = document.forms["form1"]["uname"].value;
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