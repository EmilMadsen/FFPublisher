<?php
session_start();

include ('APIController.php');


if(isset($_POST['allergyName']) && isset($_POST['allergyDescription']))
{
    $allergyName = $_POST['allergyName'];
    $allergyDescription = $_POST['allergyDescription'];

    switch($_POST['method'])
    {
        case 'create':
            createAllergy($allergyName, $allergyDescription);
            break;
        default:
            header('location: ../view/allergies/index.php?default');
    }

}




function createAllergy($allergyName, $allergyDescription)
{
    $url = '/allergies';
    $arr = array(
        'allergyName' => $allergyName,
        'allergyDescription' => $allergyDescription
    );

    $arr = json_encode($arr);

    $response = postToApi($url, $arr);

    //echo $response;
    //echo "<script>alert('Message');</script>";

    header('location: ../view/allergies/index.php?success');

}