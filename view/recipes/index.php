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

<center><h1>Recipes</h1></center>

<div class="container" style="margin-top: 30px">
    <table class="table table-bordered table-responsive table-hover">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>ImageFilePath</th>
        <th>RecipeType</th>
        <th>Published</th>
        <th>PublisherId</th>
        <th>PublisherName</th>
<!--        <th>Ingredients</th>-->
        </thead>

        <tbody>
        <?php

        include('../../model/recipe.php');

        $recipes = (new Recipe())->getRecipes();
        var_dump($recipes);
        
        if (!is_null($recipes)) {
            foreach ($recipes as $recipe){

                echo
                    '<tr>' .
                        '<td>' . $recipe->getRecipeId()  . '</td>' .
                        '<td>' . $recipe->getRecipeName() . '</td>' .
                        '<td>' . $recipe->getRecipeDescription() . '</td>' .
                        '<td>' . $recipe->getRecipeImageFilePath() . '</td>' .
                        '<td>' . $recipe->getRecipeType()->getRecipeTypeName() . '</td>' .
                        '<td>' . $recipe->getPublished() . '</td>' .
                        '<td>' . $recipe->getPublisherId() . '</td>' .
                        '<td>' . $recipe->getPublisherName() . '</td>' .
    //                    '<td>' . $recipe->getMeasuredIngredients() . '</td>' .
                    '</tr>'

                ;

            }
        }
        else {
            echo "0 results";
        }

        ?>
<!--        <tr>-->
<!--            <td  style="text-align: right" colspan="8">-->
<!--                <table width="100%" class="text-right">-->
<!--                    <tr>-->
<!--                        <th>something</th>-->
<!--                        <th>something</th>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>kkksksksk</td>-->
<!--                        <td>kkksksksk</td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!---->
<!--        </tr>-->
        </tbody>
    </table>
    <input class="standardButton marginTop marginBot" type="button" value="Suggest Recipe" onclick="location.href = 'createRecipe.php'">
</div>