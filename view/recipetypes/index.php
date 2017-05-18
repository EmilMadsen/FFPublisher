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

<center><h1>Recipe Types</h1></center>

<div class="container" style="margin-top: 30px">
    <table class="table table-bordered table-responsive table-hover">
        <thead>
        <th>Id</th>
        <th>Name</th>
        </thead>

        <tbody>
        <?php

        include('../../model/RecipeType.php');

        $recipetypes = (new RecipeType())->getRecipeTypes($_SESSION['auth_token']);

        if (!is_null($recipetypes)) {
            foreach ($recipetypes as $recipetype){

                echo
                    '<tr>' .
                    '<td>' . $recipetype->getRecipeTypeId()  . '</td>' .
                    '<td>' . $recipetype->getRecipeTypeName() . '</td>' .
                    '</tr>';
            }
        }
        else {
            echo "0 results";
        }

        ?>
        </tbody>
    </table>
    <input class="standardButton marginTop marginBot" type="button" value="Suggest Recipe Type" onclick="location.href = 'createRecipeType.php'">
</div>