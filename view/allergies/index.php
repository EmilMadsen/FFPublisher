<?php
session_start(); // used for sending auth_token

include ('../navbar.php');

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

echo $_SESSION['auth_token'];

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

<center><h1>Allergies</h1></center>

<div class="container" style="margin-top: 30px">
    <table class="table table-bordered table-responsive table-hover">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
        </thead>

        <tbody>
        <?php

        include('../../model/Allergy.php');

        $allergies = (new Allergy())->getAllergies();

        if (!is_null($allergies)) {
            foreach ($allergies as $allergy){

                echo
                    '<tr>' .
                    '<td>' . $allergy->getAllergyId()  . '</td>' .
                    '<td>' . $allergy->getAllergyName() . '</td>' .
                    '<td>' . $allergy->getAllergyDescription() . '</td>' .
                    '</tr>';
            }
        }
        else {
            echo "0 results";
        }

        ?>
        </tbody>
    </table>
    <input class="standardButton marginTop marginBot" type="button" value="Suggest Allergy" onclick="location.href = 'createAllergy.php'">
</div>