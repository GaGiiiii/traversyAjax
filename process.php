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


    // FOR FETCH API !!! 
    // https://codepen.io/dericksozo/post/fetch-api-json-php

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    if ($contentType === "application/json") {
        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));

        //print_r($content); // Prints JSON That we sent

        $decoded = json_decode($content, true);
        $name = $decoded['name'];

        //print_r($decoded); // Prints associative array

        //If json_decode failed, the JSON is invalid.
        if(is_array($decoded)) {
            $query = "INSERT INTO User (name) VALUES ('$name')";

            if(mysqli_query($connection, $query)){
                echo "User $name added.";
            }else{
                echo 'Error: ' . mysqli_error($connection);
            }
        } else {
            // Send error back to user.
        }
    }
