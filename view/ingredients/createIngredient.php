<?php

session_start();

if($_SESSION['loggedIn'] != true)
{
    header("location: ../../login.php?auth");
    exit;
}

include('../../model/Allergy.php');

include('../navbar.php');

$allergies = (new Allergy())->getAllergies();
?>

<html>
<head>
    <title>Create Ingredient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/iburn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="margin: 0 auto; width: 20%">
    <h1 class="form-signup-heading">Create Ingredient</h1>
    <div style="margin-top: 30px; margin-bottom: 30px">
        <form action="../../controller/IngredientController.php" method="post">
            <input type="hidden" name="method" value="create">
            <label for="ingredientName" class="sr-only">Name</label>
            <input type="text" name="ingredientName" id="ingredientName" class="form-control" placeholder="Name" style="border-radius: 0" required>
            <br>
            <label for="ingredientDescription" class="sr-only">ingredientDescription</label>
            <textarea type="text" name="ingredientDescription" id="ingredientDescription" class="form-control" placeholder="Description" style="border-radius: 0" required></textarea>
            <br>
            <select multiple class="form-control" id="category" name="category" style="border-radius: 0">
                <option value="0">--Select Allergy--</option>
                <?php foreach ($allergies as $allergy){ ?>
                    <option value="<?php echo $allergy->getAllergyName() ?>"><?php echo $allergy->getAllergyName() ?></option>
                <?php  }?>
            </select>
            <br>
            <input class="standardButton" style="width: 100%" type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
