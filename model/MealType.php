<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:34
 */
class MealType
{
    private $mealTypeId;
    private $mealTypeName;

    /**
     * MealType constructor.
     * @param $mealTypeId
     * @param $mealTypeName
     */
    public function __construct($mealTypeId=null, $mealTypeName=null)
    {
        $this->mealTypeId = $mealTypeId;
        $this->mealTypeName = $mealTypeName;
    }

    /**
     * @return mixed
     */
    public function getMealTypeId()
    {
        return $this->mealTypeId;
    }

    /**
     * @param mixed $mealTypeId
     */
    public function setMealTypeId($mealTypeId)
    {
        $this->mealTypeId = $mealTypeId;
    }

    /**
     * @return mixed
     */
    public function getMealTypeName()
    {
        return $this->mealTypeName;
    }

    /**
     * @param mixed $mealTypeName
     */
    public function setMealTypeName($mealTypeName)
    {
        $this->mealTypeName = $mealTypeName;
    }

    public static function getMealTypes()
    {
        include ('../../controller/APIController.php');
        $url = '/mealTypes';

        $wrapper = getFromApi($url);
        $mealtypes = [];

        if(isset($wrapper))
        {
            foreach ($wrapper as $wrap)
            {
                foreach ($wrap as $innerMealType)
                {
                    $tempMealType = new MealType($innerMealType['mealTypeId'], $innerMealType['mealTypeName']);
                    $mealtypes[] = $tempMealType;
                }
            }
        }

        return $mealtypes;

    }


}