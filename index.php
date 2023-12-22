<!-- header php  -->
<?php
    $page_id = 1;
    include "inc_header.php";
?>

        <title>contact book</title>

        <style>
            /* home page*/
            .box{
                background: #fff;
                height: 100px;
                width: 100px;
                text-align: center;
                color: #000;
                display: block;
                border: 5px solid #F3B918;
                padding: 20px;
                text-decoration: none;
                border-radius: 100px;
                margin: 50px 20px 0;
            }
            .box:hover{
                background: #F27609;
            }
            .item{
                display: block;
                text-transform: uppercase;
                padding-top: 10px;
                font-weight: bold;

            }
            .imgs{
                width: 50px;
            }
            main{
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            
        </style>
    </head>

    <body>
        <!-- header section  -->
        <header>
            <div id="welcome">
                <span id="uname">Hi, <?php echo $_SESSION['name']; ?></span>
                <a href="login.php"><img src="icons/logout.svg" alt="logout" id="logout"></a>
            </div>
            <h1>contact book <span id="pgname">- home</span></h1>
        </header>

        <!-- home page -->
        <main>
            <a href="all.php" class="box">
                <img src="icons/search.svg" alt="search" class="imgs">
                <span class="item">show all</span>
            </a>
            <a href="add.php" class="box">
                <img src="icons/add.svg" alt="add new" class="imgs">
                <span class="item">add new</span>
            </a>
            <a href="settings.php" class="box">
                <img src="icons/settings.svg" alt="setting" class="imgs">
                <span class="item">setting</span>
            </a>
            <a href="logout.php" class="box">
                <img src="icons/logout.svg" alt="logout" class="imgs">
                <span class="item">log out</span>
            </a>

<!-- php footer -->
<?php
    include "inc_footer.php" ;
?>