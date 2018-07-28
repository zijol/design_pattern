<?php

class Person
{
    private $name;
    private $gender;
    private $maritalStatus;

    public function __construct($name, $gender, $maritalStatus)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->maritalStatus = $maritalStatus;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }
}

/**
 * Interface Criteria
 * 标准接口
 */
interface Criteria
{
    public function meetCriteria($personsArray);

    public function echoPersons();
}

/**
 * Class CriteriaMale
 * 男人 - 标准
 */
class CriteriaMale implements Criteria
{
    private $persons = [];

    public function meetCriteria($personsArray)
    {
        $this->persons = [];
        foreach ($personsArray as $person) {
            if ($person->getGender() == 'Male') {
                $this->persons[] = $person;
            }
        }
        return $this->persons;
    }

    public function echoPersons()
    {
        echo '--- Male Begin---<br/>';
        foreach ($this->persons as $person) {
            echo "Name: " . $person->getName() . ", Gender: " . $person->getGender() . ", Marital: " . $person->getMaritalStatus() . ".<br/>";
        }
        echo '--- Male End---<br/>';
    }
}

/**
 * Class CriteriaFemale
 * 女人 - 标准
 */
class CriteriaFemale implements Criteria
{
    private $persons = [];

    public function meetCriteria($personsArray)
    {
        $this->persons = [];
        foreach ($personsArray as $person) {
            if ($person->getGender() == 'Female') {
                $this->persons[] = $person;
            }
        }
        return $this->persons;
    }

    public function echoPersons()
    {
        echo '--- Female Begin---<br/>';
        foreach ($this->persons as $person) {
            echo "Name: " . $person->getName() . ", Gender: " . $person->getGender() . ", Marital: " . $person->getMaritalStatus() . ".<br/>";
        }
        echo '--- Female End---<br/>';
    }
}

/**
 * Class CriteriaSingle
 * 单身 - 标准
 */
class CriteriaSingle implements Criteria
{
    private $persons = [];

    public function meetCriteria($personsArray)
    {
        $this->persons = [];
        foreach ($personsArray as $person) {
            if ($person->getMaritalStatus() == 'Single') {
                $this->persons[] = $person;
            }
        }
        return $this->persons;
    }

    public function echoPersons()
    {
        echo '--- Single Begin---<br/>';
        foreach ($this->persons as $person) {
            echo "Name: " . $person->getName() . ", Gender: " . $person->getGender() . ", Marital: " . $person->getMaritalStatus() . ".<br/>";
        }
        echo '--- Single End---<br/>';
    }
}

class AndCriteria implements Criteria
{
    private $criteriaOne;
    private $criteriaTwo;
    private $persons;

    public function __construct($criteriaOne, $criteriaTwo)
    {
        $this->criteriaOne = $criteriaOne;
        $this->criteriaTwo = $criteriaTwo;
    }

    public function meetCriteria($personsArray)
    {
        $this->persons = [];
        $andPersons = $this->criteriaOne->meetCriteria($personsArray);
        $this->persons = $this->criteriaTwo->meetCriteria($andPersons);
        return $this->persons;
    }

    public function echoPersons()
    {
        echo '--- And Begin---<br/>';
        foreach ($this->persons as $person) {
            echo "Name: " . $person->getName() . ", Gender: " . $person->getGender() . ", Marital: " . $person->getMaritalStatus() . ".<br/>";
        }
        echo '--- And End---<br/>';
    }
}

class OrCriteria implements Criteria
{
    private $criteriaOne;
    private $criteriaTwo;
    private $persons;

    public function __construct($criteriaOne, $criteriaTwo)
    {
        $this->criteriaOne = $criteriaOne;
        $this->criteriaTwo = $criteriaTwo;
    }

    public function meetCriteria($personsArray)
    {
        $this->persons = [];
        $firstCriteriaPersons = $this->criteriaOne->meetCriteria($personsArray);
        $secondCriteriaPersons = $this->criteriaOne->meetCriteria($personsArray);
//        $this->persons = array_merge($firstCriteriaPersons, $secondCriteriaPersons);
        $this->persons = $firstCriteriaPersons + $secondCriteriaPersons;
        return $this->persons;
    }

    public function echoPersons()
    {
        echo '--- Or Begin---<br/>';
        foreach ($this->persons as $person) {
            echo "Name: " . $person->getName() . ", Gender: " . $person->getGender() . ", Marital: " . $person->getMaritalStatus() . ".<br/>";
        }
        echo '--- Or End---<br/>';
    }
}

$personsArray = [];
$personsArray[] = new Person("Robert", "Male", "Single");
$personsArray[] = new Person("John", "Male", "Married");
$personsArray[] = new Person("Laura", "Female", "Married");
$personsArray[] = new Person("Diana", "Female", "Single");
$personsArray[] = new Person("Mike", "Male", "Single");
$personsArray[] = new Person("Bobby", "Male", "Single");

$male = new CriteriaMale();
$female = new CriteriaFemale();
$single = new CriteriaSingle();
$singleMale = new AndCriteria($single, $male);
$singleOrFemale = new OrCriteria($single, $female);

$male->meetCriteria($personsArray);
$male->echoPersons();
$female->meetCriteria($personsArray);
$female->echoPersons();
$single->meetCriteria($personsArray);
$single->echoPersons();
$singleMale->meetCriteria($personsArray);
$singleMale->echoPersons();
$singleOrFemale->meetCriteria($personsArray);
$singleOrFemale->echoPersons();