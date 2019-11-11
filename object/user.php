<?php
class User{
 
    #database connection and table name
    private $conn;
    private $TableName= "Users";
 
    #user properties
    public $UserEmail;
    public $UserPassword;


    #Construct with database
    function __construct($db)
    {
        $this->conn = $db;
    }


    // Create new user
    public function signUp(){
        $query = "INSERT INTO $this->TableName SET UserEmail=:UserEmail, UserPassword=:UserPassword";
        #prepare query
        $stmt = $this->conn->prepare($query); 	
    	//Bind        
        $stmt->bindParam(":UserEmail", $this->UserEmail);
        $stmt->bindParam(":UserPassword", $this->UserPassword);

        #execute query
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    #get user info
    function getUserInfo()
    {
        #select query
        $query = "SELECT UserId, UserEmail FROM $this->TableName WHERE UserEmail =:UserEmail";
        #prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":UserEmail", $this->UserEmail);
        $stmt->execute();
        $UserInfo = array();         
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             #extract row
             #this will make $row['name'] to just $name only
             extract($row);
             $userArray = array(
                 "UserId" => $UserId,
                 "UserEmail" => $UserEmail
             );
     
             array_push($UserInfo, $userArray);
         }
        
         return $UserInfo;
    }
    // user login
    function login(){
        $query = "SELECT UserEmail FROM $this->TableName WHERE UserEmail = :UserEmail LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":UserEmail", $this->UserEmail);
        if($stmt->execute()){
            $query = "SELECT *FROM $this->TableName WHERE UserEmail = :UserEmail LIMIT 0,1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":UserEmail", $this->UserEmail);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            #this will make $row['name'] to just $name only
            extract($row);
            $hashed_password = $UserPassword;
            if(password_verify($this->UserPassword, $hashed_password)){
                return true;
            }
            return false;
        }
        return false;
    }
    // check if user already exist
    function userExist(){
        $query = "SELECT *FROM $this->TableName WHERE UserEmail =:UserEmail LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":UserEmail", $this->UserEmail);
        $stmt->execute();
        $num = $stmt->fetchColumn();
        if($num > 0){
            return true;
        }
        return false;
    }
}
?>
