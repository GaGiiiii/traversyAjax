<?php

    $connection = mysqli_connect('localhost', 'root', '', 'ajax');


    echo "Processing...\n";

    if(isset($_GET['name'])){
        echo 'GET: Your name is: ' . $_GET['name'];
    }

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($connection, $name);
        
        $query = "INSERT INTO User (name) VALUES ('$name')";

        if(mysqli_query($connection, $query)){
            echo 'User Added';
        }else{
            echo 'Error: ' . mysqli_error($connection);
        }


        echo '\nPOST: Your name is: ' . $_POST['name'];
    }
