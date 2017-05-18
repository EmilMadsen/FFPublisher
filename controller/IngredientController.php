<?php
session_start();

include ('APIController.php');

if(isset($_POST['ingredientName']) && isset($_POST['ingredientDescription']))
{
    $ingredientName = $_POST['ingredientName'];
    $ingredientDescription = $_POST['ingredientDescription'];

    switch($_POST['method'])
    {
        case 'create':
            createIngredient($ingredientName, $ingredientDescription);
            break;
        default:
            header('location: ../view/ingredients/index.php?default');
    }

}


function createIngredient($ingredientName, $ingredientDescription)
{
    $url = '/ingredients';
    $arr = array(
        'ingredientName' => $ingredientName,
        'ingredientDescription' => $ingredientDescription,
        'allergies' => array()
    );

    $arr = json_encode($arr);

    $response = postToApi($url, $arr);

    //echo $response;
    //echo "<script>alert('Message');</script>";

    header('location: ../view/ingredients/index.php?success');

}