<?php
require ($_SERVER["DOCUMENT_ROOT"].'/AlumniTracker/Database/config.php');
echo "Alumni Class";
class AlumniClass
{
    private $PersonID;
    private $FirstName;
    private $MiddleName;
    private $LastName;
    private $PrimaryEmail;
    private $SecondaryEmail;
    private $Tracked;
    
    public function __construct($firstName, $middleName, $lastName, $primEmail, $secEmail, $tracked, $personID = NULL) 
        {
            #parent::_construct();
            $this->setID($personID);
            $this->setFirstName($firstName);
            $this->setMiddleName($middleName);
            $this->setLastName($lastName);
            $this->setPrimaryEmail($primaryEmail);
            $this->setSecondaryEmail($secondaryEmail);
            $this->setTracked($tracked);        
            
        }
        
        public function getID(){return $this->PersonID;}
        public function getFirstName(){return $this->FirstName;}
        public function getMiddleName(){return $this->MiddleName;}
        public function getLastName(){return $this->LastName;}
        public function getPrimaryEmail(){return $this->PrimaryEmail;}
        public function getSecondaryEmail(){return $this->SecondaryEmail;}
        public function getTracked(){return $this->Tracked;}
        
        public function setID($personID){return $this->PersonID=$personID;}
        public function setFirstName($firstName){return $this->FirstName=$firstName;}
        public function setMiddleName($middleName){return $this->MiddleName=$middleName;}
        public function setLastName($lastName){return $this->LastName=$lastName;}
        public function setPrimaryEmail($primEmail){return $this->PrimaryEmail=$primEmail;}
        public function setSecondaryEmail($secEmail){return $this->SecondaryEmail=$secEmail;}
        public function setTracked($tracked){return $this->Tracked=$tracked;}
        
        public function createAlumni()
        {
            try
            {
                $sql=$pdo->prepare("INSERT INTO Person (FirstName, MiddleName, LastName, PrimaryEmail, SecondEmail, Tracked)
                VALUES ('".$this->getFirstName()."', '".$this->getMiddleName()."', '".$this->getLastName()."', '".$this->getPrimaryEmail()."',"
                        . " '".$this->getSecondaryEmail()."', '".$this->getTracked()."' )");
            
            $sql->execute();
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
       
    }
    
    public function updateAlumni()
    {
        echo 'entered updateEmployer';
        try
        {
        $sql="UPDATE Person "
            . "SET FirstName= '".$this->$firstName."', MiddleName= '".$this->$middleName."', LastName= '".$this->$lastName."', "
            . "PrimaryEmail= '".$this->$primEmail."', SecondEmail= '".$this->$secEmail."', Tracked= '".  $this->$tracked."'" 
            . "WHERE PersonID='".$this->$personID."';";
        
        $sql->execute();
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
    }
}
?>