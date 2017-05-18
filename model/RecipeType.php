<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:33
 */
class RecipeType
{
    private $recipeTypeId;
    private $recipeTypeName;

    public function __construct($recipeTypeId=null, $recipeTypeName=null)
    {
        $this->recipeTypeId = $recipeTypeId;
        $this->recipeTypeName = $recipeTypeName;
    }

    public function getRecipeTypeId()
    {
        return $this->recipeTypeId;
    }

    public function setRecipeTypeId($recipeTypeId)
    {
        $this->recipeTypeId = $recipeTypeId;
    }

    public function getRecipeTypeName()
    {
        return $this->recipeTypeName;
    }

    public function setRecipeTypeName($recipeTypeName)
    {
        $this->recipeTypeName = $recipeTypeName;
    }

    public static function getRecipeTypes()
    {
        include ('../../controller/APIController.php');
        $url = '/recipeTypes';

        $wrapper = getFromApi($url);
        $recipetypes = [];

        if(isset($wrapper))
        {
            foreach ($wrapper as $wrap)
            {
                foreach ($wrap as $innerRecipeType)
                {
                    $tempRecipeType = new RecipeType($innerRecipeType['recipeTypeId'], $innerRecipeType['recipeTypeName']);
                    $recipetypes[] = $tempRecipeType;
                }
            }
        }

        return $recipetypes;

    }


}