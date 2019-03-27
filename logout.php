<?php
session_start();
unset($_SESSION['connetced']);
header('Location: index.php');

