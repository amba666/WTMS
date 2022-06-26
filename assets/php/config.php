<?php
      class Database{

        const USERNAME = 'wtmstz@gmail.com';
        const PASSWORD = 'ambakisye';

                private $dsn = "mysql:host=localhost;dbname=w_db";
                private $dbuser ="root";
                private $dbpass = "";


                public $conn;

                public function __construct( ){
                    try{
                        $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpass);
                        //echo "connected";
                    } catch(PDOException $e){
                        echo "Error: " . $e->getMessage();

                    }
                    return $this->conn;
                }

                //check input

                public function test_input($data){
                    //trim will remove all the whitespace tha assciated with imput
                    $data = trim($data);
                    
                    $data = stripslashes($data);
                      //htmlspecialchars will remove all the htmlspecialchars like <>
                    $data =htmlspecialchars($data);

                    return $data;
                
                }

                //display messages aletzss
                public function showMessage($type,$message){  
                    return '<div class="alert alert-'.$type.' alert-dismissible">
                            <button type="button" class="close" data-dismiss = "alert">&times;</button>
                            <strong class = "text-center" >'.$message.'</strong>
                            
                            </div>';

      }




    }
//$ob = new Database();

?>
