<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $inputData = isset($_POST["dataInput"]) ? $_POST["dataInput"] : 'empty';
        $_SESSION['user_role'] = htmlspecialchars($inputData);
        echo $_SESSION['user_role'];
    }else{
        echo "No data received";
    }

 
?>