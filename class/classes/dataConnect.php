<?php
/**
 * @author Vineeth E
 * @copyright 2014
 */
  
class createConnection //create a class for make connection
{
    var $host="localhost";
    var $username="root";    // specify the sever details for mysql
    var $password="";
    var $database="onetoone";
    var $myconn;

    function connectToDatabase() // create a function for connect database
    {
        $conn= mysql_connect($this->host,$this->username,$this->password);
        if(!$conn)// testing the connection
        {
            die ("Cannot connect to the database");
        }
        else
        {
            $this->myconn = $conn;
            //echo "Connection established";
        }
        return $this->myconn;
    }

    function selectDatabase() // selecting the database.
    {
        mysql_select_db($this->database);  //use php inbuild functions for select database
        if(mysql_error()) // if error occured display the error message
        {
            echo "Cannot find the database ".$this->database;
        }
    }

    function selectRecords($query) // selecting the records.
    {
        return mysql_query($query,$this->myconn);  //use php inbuild functions for select database
    }
    
    function fetchRecords($resultset) // selecting the records.
    {
       return mysql_fetch_array($resultset);  //use php inbuild functions for select database
    }
    
    function numRecords($resultset)
    {
        return mysql_num_rows($resultset);
    }
    
    function closeConnection() // close the connection
    {
        mysql_close($this->myconn);
    }

}
?>