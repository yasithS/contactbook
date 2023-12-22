</head>


    <body>
        <!-- header section  -->
        <header>
            <div id="welcome">
                <span id="uname">Hi,<?php echo $_SESSION['name']; ?></span>
                <a href="logout.php"><img src="icons/logout.svg" alt="logout" id="logout"></a>
            </div>

            <?php
                $page_name = array("","","Home","Add Contact","Edit Contact","All contact","View Contact","Settings");
            ?>
            
            <h1>contact book <span id="pgname">- <?php echo $page_name[$page_id]; ?> </span></h1>
        </header>

        <!-- navbar section  -->
        <nav id="menu">
            <a href="index.php" class="menu">
                <img src="icons/home-yellow.svg" alt="home" class="menuimg">
                <span class="menutext">Home</span>
            </a>
            <a href="add.php" class="menu">
                <img src="icons/add-yellow.svg" alt="add" class="menuimg">
                <span class="menutext" <?php if($page_id==3) echo 'id="active"' ?>>add new</span>
            </a>
            <a href="all.php" class="menu">
                <img src="icons/search-yellow.svg" alt="add" class="menuimg">
                <span class="menutext" <?php if($page_id==5) echo 'id="active"' ?>>show all</span>
            </a>
            <a href="settings.php" class="menu">
                <img src="icons/settings-yellow.svg" alt="add" class="menuimg">
                <span class="menutext" <?php if($page_id==7) echo 'id="active"' ?>>settings</span>
            </a>
            <a href="logout.php" class="menu">
                <img src="icons/logout-yellow.svg" alt="add" class="menuimg">
                <span class="menutext">logout</span>
            </a>
        </nav>

        <!-- main section -->
        <main>