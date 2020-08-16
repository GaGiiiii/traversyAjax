<?php

    $connection = mysqli_connect('localhost', 'root', '', 'ajax');
    $query = "SELECT * FROM User";
    $result = mysqli_query($connection, $query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($users);
