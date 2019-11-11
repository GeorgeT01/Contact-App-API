<?php 
 #Class Database
class Database
{

    #Variable to store database link
    private $conn;
    // specify database credentials
    private $Host = "localhost";
    private $DatabaseName = "db";
    private $UserName = "root";
    private $Password = "";

    
    #This method will connect to the database
    function connect()
    {
    	 $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->Host . ";dbname=" . $this->DatabaseName, $this->UserName, $this->Password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
 
    }
}
$db = new Database();
$db->connect();
?>
