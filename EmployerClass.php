<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require ($_SERVER["DOCUMENT_ROOT"].'/AlumniTracker/Database/config.php');
echo "Employer Class";
class EmployerClass
{
    private $EmployerID;
    private $EmployerName;
    private $EmployerNum;
    private $EmployerComp;
    private $EmployerEmail;
    
    public function __construct($empName, $empNum, $empComp, $empEmail, $empID = NULL) 
        {
            #parent::_construct();
            $this->setID($empID);
            $this->setName($empName);
            $this->setEmail($empEmail);
            $this->setNumber($empNum);
            $this->setCompany($empComp);
            
            
        }
        
        public function getID(){return $this->EmployerID;}
        public function getName(){return $this->EmployerName;}
        public function getEmail(){return $this->EmployerEmail;}
        public function getNumber(){return $this->EmployerNum;}
        public function getCompany(){return $this->EmployerComp;}
        
        public function setID($empID){$this->EmployerID=$empID;}
        public function setName($empName){$this->EmployerName=$empName;}
        public function setEmail($empEmail){$this->EmployerEmail=$empEmail;}
        public function setNumber($empNum){$this->EmployerNum=$empNum;}
        public function setCompany($empComp){$this->EmployerComp=$empComp;}
        
        public function createEmployer()
        {
            try
            {
                $sql=$pdo->prepare("INSERT INTO employer (EmployerName, EmployerNum, EmployerComp, EmployerEmail)
                VALUES ('".$this->getName()."', '".$this->getNum()."', '".$this->getComp()."', '".$this->getEmail()."')");
            
            $sql->execute();
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
       
    }
    
    public function updateEmployer()
    {
        echo 'entered updateEmployer';
        try
        {
        $sql="UPDATE employer "
            . "SET EmployerName= '".$this->$empName()."', EmployerNum= '".$this->$empNum()."', EmployerComp= '".$this->$empComp()."', "
            . "EmployerEmail= '".$this->$empEmail()."' "
            . "WHERE EmployerID='".$this->$empID()."';";
        
        $sql->execute();
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
    }
}
?>