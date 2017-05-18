<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:28
 */
class Allergy
{
    private $allergyId;
    private $allergyName;
    private $allergyDescription;

    public function __construct($id=null, $allergyName=null, $allergyDescription=null)
    {
        $this->allergyId = $id;
        $this->allergyName = $allergyName;
        $this->allergyDescription = $allergyDescription;
    }

    public function getAllergyId()
    {
        return $this->allergyId;
    }

    public function setAllergyId($allergyId)
    {
        $this->allergyId = $allergyId;
    }

    public function getAllergyName()
    {
        return $this->allergyName;
    }

    public function setAllergyName($allergyName)
    {
        $this->allergyName = $allergyName;
    }

    public function getAllergyDescription()
    {
        return $this->allergyDescription;
    }

    public function setAllergyDescription($allergyDescription)
    {
        $this->allergyDescription = $allergyDescription;
    }

    public static function getAllergies()
    {
        include ('../../controller/APIController.php');
        $url = '/allergies';

        $allergyWrapper = getFromApi($url);
        $allergies = [];

        //unwrapping the json data
        foreach ($allergyWrapper as $allergy)
        {
            foreach ($allergy as $innerAllergy)
            {
                $tempAllergy = new Allergy($innerAllergy['allergyId'], $innerAllergy['allergyName'], $innerAllergy['allergyDescription']);
                $allergies[] = $tempAllergy;
            }
        }

        return $allergies;

    }

}