<?php

session_start();

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

include('../navbar.php');
?>

<html>
<head>
    <title>Create Recipe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="margin: 0 auto; width: 20%">
    <h1 class="form-signup-heading">Create Recipe</h1>
    <div style="margin-top: 30px; margin-bottom: 30px">
        <form action="../../controller/RecipeController.php" method="post">
            <input type="hidden" name="method" value="create">
            <label for="recipeName" class="sr-only">Name</label>
            <input type="text" name="recipeName" id="recipeName" class="form-control" placeholder="Name" style="border-radius: 0" required>
            <br>
            <label for="recipeDescription" class="sr-only">Description</label>
            <input type="text" name="recipeDescription" id="recipeDescription" class="form-control" placeholder="Description" style="border-radius: 0" required>
            <br>
            <input class="standardButton" style="width: 100%" type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
