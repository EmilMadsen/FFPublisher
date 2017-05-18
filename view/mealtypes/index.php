<?php
session_start(); // used for sending auth_token

include ('../navbar.php');

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<center><h1>Meal Types</h1></center>

<div class="container" style="margin-top: 30px">
    <table class="table table-bordered table-responsive table-hover">
        <thead>
        <th>Id</th>
        <th>Name</th>
        </thead>

        <tbody>
        <?php

        include('../../model/MealType.php');

        $mealtypes = (new MealType())->getMealTypes($_SESSION['auth_token']);

        if (!is_null($mealtypes)) {
            foreach ($mealtypes as $mealtype){

                echo
                    '<tr>' .
                    '<td>' . $mealtype->getMealTypeId()  . '</td>' .
                    '<td>' . $mealtype->getMealTypeName() . '</td>' .
                    '</tr>';
            }
        }
        else {
            echo "0 results";
        }

        ?>
        </tbody>
    </table>
    <input class="standardButton marginTop marginBot" type="button" value="Suggest Meal Type" onclick="location.href = 'createMealType.php'">
</div>