<?php
    session_cache_limiter('nocache');
    session_cache_expire(30);
    session_start();
    if($page_id!=2 && !isset($_SESSION['id'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="common.css">

        <?php
            // available on all except home page and login page
            if ($page_id!=1 && $page_id!=2)
            echo '<link rel="stylesheet" href="menu.css">'
        ?>