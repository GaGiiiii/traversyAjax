<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $connection = mysqli_connect('localhost', 'root', '', 'ajax');
        $query = "SELECT * FROM User WHERE id = $id";
        $result = mysqli_query($connection, $query);
    
        $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($user);
    
        echo "<strong>ID: </strong>" . $user[0]['id'] . "<br>";
        echo "<strong>Name: </strong>" . $user[0]['name'] . "<br>";
    }else{
        echo "No selected user.";
    }

