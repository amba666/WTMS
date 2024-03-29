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


      //display in  ago human readable hehehe
      public function timeInAgo($timestamp){
        date_default_timezone_set('Africa/Nairobi');

        $timestamp= strtotime($timestamp) ? strtotime($timestamp): $timestamp;//converting  time to seconds

        $time = time() -$timestamp;
        switch($time){
            //seconds
            case $time <= 60;
            return 'Just now';
            //mins
            case $time >= 60 && $time <3600;
            return (round($time / 60) ==1 )? 'a minute ago' : round($time/60).'minutes ago';
            //hours
            case $time >= 3600 && $time <86400;
            return (round($time / 3600) ==1 )? 'a hour ago' : round($time/3600).'hours ago';
                //days
            case $time >= 86400 && $time <604800;
            return (round($time / 86400) ==1 )? 'a day ago' : round($time/86400).'days ago';
                //weeks
            case $time >= 604800 && $time <2600640;
            return (round($time / 604800) ==1 )? 'a week ago' : round($time/604800).'weeks ago';
           //month
            case $time >= 2600640 && $time <31207680;
            return (round($time / 2600640) ==1 )? 'a month ago' : round($time/2600640).'months ago';
            //years
            case $time >= 31207680;
            return (round($time / 31207680) ==1 )? 'a year ago' : round($time/31207680).'years ago';
            
            

        }
      } 



    }
//$ob = new Database();

?>
