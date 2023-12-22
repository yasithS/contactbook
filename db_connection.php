<?php
    $db = new PDO('mysql:host=localhost;dbname=contactbook','root','kavik');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
?>