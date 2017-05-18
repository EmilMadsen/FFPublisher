<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:38
 */
class Recipe
{
    private $recipeId;
    private $recipeName;
    private $recipeDescription;
    private $recipeImageFilePath;
    private $recipeType; //class
    private $published;
    private $publisherId;
    private $publisherName;
    private $measuredIngredients; //array of class

    public function __construct(
        $recipeId=null, $recipeName=null, $recipeDescription=null, $recipeImageFilePath=null,
        $recipeType=null, $published=null, $publisherId=null, $publisherName=null, $measuredIngredients=null)

    {
        $this->recipeId = $recipeId;
        $this->recipeName = $recipeName;
        $this->recipeDescription = $recipeDescription;
        $this->recipeImageFilePath = $recipeImageFilePath;
        $this->recipeType = $recipeType;
        $this->published = $published;
        $this->publisherId = $publisherId;
        $this->publisherName = $publisherName;
        $this->measuredIngredients = $measuredIngredients;
    }

    public function getRecipeId()
    {
        return $this->recipeId;
    }

    public function setRecipeId($recipeId)
    {
        $this->recipeId = $recipeId;
    }

    public function getRecipeName()
    {
        return $this->recipeName;
    }

    public function setRecipeName($recipeName)
    {
        $this->recipeName = $recipeName;
    }

    public function getRecipeDescription()
    {
        return $this->recipeDescription;
    }

    public function setRecipeDescription($recipeDescription)
    {
        $this->recipeDescription = $recipeDescription;
    }

    public function getRecipeImageFilePath()
    {
        return $this->recipeImageFilePath;
    }

    public function setRecipeImageFilePath($recipeImageFilePath)
    {
        $this->recipeImageFilePath = $recipeImageFilePath;
    }

    public function getRecipeType()
    {
        return $this->recipeType;
    }

    public function setRecipeType($recipeType)
    {
        $this->recipeType = $recipeType;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published = $published;
    }

    public function getPublisherId()
    {
        return $this->publisherId;
    }

    public function setPublisherId($publisherId)
    {
        $this->publisherId = $publisherId;
    }

    public function getPublisherName()
    {
        return $this->publisherName;
    }

    public function setPublisherName($publisherName)
    {
        $this->publisherName = $publisherName;
    }

    public function getMeasuredIngredients()
    {
        return $this->measuredIngredients;
    }

    public function setMeasuredIngredients($measuredIngredients)
    {
        $this->measuredIngredients = $measuredIngredients;
    }


    public static function getRecipes()
    {
        include ('../../controller/APIController.php');
        include('RecipeType.php');
        $url = '/recipes';

        $recipeWrapper = getFromApi($url);
        $recipes = [];

        if(isset($recipeWrapper))
        {
            foreach ($recipeWrapper as $recipe)
            {
                foreach ($recipe as $innerRecipe)
                {
                    $tempRecipe = new Recipe(
                        $innerRecipe['recipeId'],
                        $innerRecipe['recipeName'],
                        $innerRecipe['recipeDescription'],
                        $innerRecipe['recipeImageFilePath'],
                        new RecipeType(null, $innerRecipe['recipeType']['recipeTypeName']), //use $innerRecipe['recipeType']?
                        $innerRecipe['published'],
                        $innerRecipe['publisherId'],
                        $innerRecipe['publisherName'],
                        null // Foreach measuredIngredient
                    );

                    $recipes[] = $tempRecipe;
                }
            }
        }

        return $recipes;

    }



}