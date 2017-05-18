<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:31
 */
class Ingredient
{

    private $ingredientId;
    private $ingredientName;
    private $ingredientDescription;
    private $allergies; // class

    public function __construct($ingredientId=null, $ingredientName=null, $ingredientDescription=null, $allergies=null)
    {
        $this->ingredientId = $ingredientId;
        $this->ingredientName = $ingredientName;
        $this->ingredientDescription = $ingredientDescription;
        $this->allergies = $allergies;
    }

    public function getIngredientId()
    {
        return $this->ingredientId;
    }

    public function setIngredientId($ingredientId)
    {
        $this->ingredientId = $ingredientId;
    }

    public function getIngredientName()
    {
        return $this->ingredientName;
    }

    public function setIngredientName($ingredientName)
    {
        $this->ingredientName = $ingredientName;
    }

    public function getIngredientDescription()
    {
        return $this->ingredientDescription;
    }

    public function setIngredientDescription($ingredientDescription)
    {
        $this->ingredientDescription = $ingredientDescription;
    }

    public function getAllergies()
    {
        return $this->allergies;
    }

    public function setAllergies($allergies)
    {
        $this->allergies = $allergies;
    }

    public static function getIngredients()
    {
        include ('../../controller/APIController.php');
        $url = '/ingredients';

        $ingredientWrapper = getFromApi($url);
        $ingredients = [];

        if(isset($ingredientWrapper))
        {
            foreach ($ingredientWrapper as $ingredient)
            {
                foreach ($ingredient as $innerIngredient)
                {
                    $tempIngredient = new Ingredient($innerIngredient['ingredientId'], $innerIngredient['ingredientName'],
                        $innerIngredient['ingredientDescription']);
                    $ingredients[] = $tempIngredient;
                }
            }
        }

        return $ingredients;
    }

    public static function getIngredientWithAllergies($ingredientId)
    {
        include ('../../controller/APIController.php');
        include('Allergy.php');
        $url = '/ingredients/'. $ingredientId;

        $wrapper = getFromApi($url);
        $ingredientWithAllergies = [];

//        var_dump($wrapper);
//        exit;

        if(isset($wrapper))
        {
            //get allergies out.
            $allergies = [];
            if(isset($wrapper['allergies']))
            {
                foreach ($wrapper['allergies'] as $allergy)
                {
                    $tempAllergy = new Allergy($allergy['allergyId'], $allergy['allergyName'], $allergy['allergyDescription']);
                    $allergies[] = $tempAllergy;
                }
            }

            //create ingredient object to return.
            $tempIngredient = new Ingredient(
                $wrapper['ingredientId'],
                $wrapper['ingredientName'],
                $wrapper['ingredientDescription'],
                $allergies);

            $ingredientWithAllergies = $tempIngredient;
        }

        return $ingredientWithAllergies;
    }
}