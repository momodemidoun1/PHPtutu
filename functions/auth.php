<?php
//checks if the visitor is connected or not
function is_connected(): bool{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['connected']);
}

//force user to connect if he wanna go to dahsboard
function force_user_connected(): void{
    if(!is_connected()){
        header('Location: login.php');
        exit();
    }
}