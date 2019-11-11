<?php
class Contact{

    #database connection and table name
    private $conn;
    private $TableName = "Contacts";
 
    #user properties
    public $ContactId;
    
    public $ContactImage;
    public $ContactName;
    public $ContactEmail;
    public $ContactPhone;
    public $ContactDateBirth;
    public $ContactGender;
    public $ContactNote;

    public $UserId;


    #Construct with database
    function __construct($db)
    {
        $this->conn = $db;
    }

    function readUserContacts(){
        #select query
        $query = "SELECT *FROM $this->TableName WHERE UserId =:UserId";
        #prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":UserId", $this->UserId);
        $stmt->execute();
        $UserContacts = array();         
         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
             #extract row
             extract($row);
             $ContactsArray = array(
                 "ContactId" => $ContactId,
                 "UserId" => $UserId,
                 "ContactImage" => $ContactImage,
                 "ContactName" => $ContactName,
                 "ContactEmail" => $ContactEmail,
                 "ContactPhone" => $ContactPhone,
                 "ContactDateBirth" => $ContactDateBirth,
                 "ContactGender" => $ContactGender,
                 "ContactNote" => $ContactNote,
             );
     
             array_push($UserContacts, $ContactsArray);
         }
        
        return $UserContacts;   
    }

    function addNewContact(){
        $query = "INSERT INTO $this->TableName SET UserId=:UserId, ContactImage=:ContactImage, ContactName=:ContactName, ContactEmail=:ContactEmail, ContactPhone=:ContactPhone, ContactDateBirth=:ContactDateBirth, ContactGender=:ContactGender, ContactNote=:ContactNote";
        #prepare query
        $stmt = $this->conn->prepare($query); 	
    	//Bind        
        $stmt->bindParam(":UserId", $this->UserId);
        $stmt->bindParam(":ContactImage", $this->ContactImage);
        $stmt->bindParam(":ContactName", $this->ContactName);
        $stmt->bindParam(":ContactEmail", $this->ContactEmail);
        $stmt->bindParam(":ContactPhone", $this->ContactPhone);
        $stmt->bindParam(":ContactDateBirth", $this->ContactDateBirth);
        $stmt->bindParam(":ContactGender", $this->ContactGender);
        $stmt->bindParam(":ContactNote", $this->ContactNote);

        #execute query
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }


    function deleteContact(){

        #delete query
        $query = "DELETE FROM $this->TableName WHERE ContactId = :ContactId";
        #prepare query
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":ContactId", $this->ContactId);
        
        #execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    function updateContact(){
         #update query
         $query = "UPDATE $this->TableName SET
         ContactImage = :ContactImage,
         ContactName = :ContactName,
         ContactEmail = :ContactEmail,
         ContactPhone = :ContactPhone,
         ContactDateBirth = :ContactDateBirth,
         ContactGender = :ContactGender,
         ContactNote = :ContactNote
         WHERE ContactId = :ContactId";
        #prepare query
        $stmt = $this->conn->prepare($query);
 	
        //Bind        
        $stmt->bindParam(":ContactImage", $this->ContactImage);
        $stmt->bindParam(":ContactName", $this->ContactName);
        $stmt->bindParam(":ContactEmail", $this->ContactEmail);
        $stmt->bindParam(":ContactPhone", $this->ContactPhone);
        $stmt->bindParam(":ContactDateBirth", $this->ContactDateBirth);
        $stmt->bindParam(":ContactGender", $this->ContactGender);
        $stmt->bindParam(":ContactNote", $this->ContactNote);
        ///
        $stmt->bindParam(":ContactId", $this->ContactId);
        #execute query
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    function readSingleContact(){
        #select query
        $query = "SELECT *FROM $this->TableName WHERE ContactId =:ContactId";
        #prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":ContactId", $this->ContactId);
        $stmt->execute();
        $Contact = array();         
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            #extract row
            extract($row);
            $ContactArray = array(
                "ContactId" => $ContactId,
                "UserId" => $UserId,
                "ContactImage" => $ContactImage,
                "ContactName" => $ContactName,
                "ContactEmail" => $ContactEmail,
                "ContactPhone" => $ContactPhone,
                "ContactDateBirth" => $ContactDateBirth,
                "ContactGender" => $ContactGender,
                "ContactNote" => $ContactNote,
            );
    
            array_push($Contact, $ContactArray);
        }
        
        return $Contact;
    }

}


?>