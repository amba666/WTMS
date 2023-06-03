<?php
require_once 'config.php';

class Admin extends Database{
    //admin login 

    public function admin_login($username, $password){
        $sql = "SELECT username, password FROM admin WHERE username =:username AND password =:password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
        


    }

//count total numbers of rows
    public function totalCount($tablename){
        $sql ="SELECT * FROM $tablename";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();
        return $count; 
    }

    //count total verified/unverified users
    public function verified_users($status){
        $sql ="SELECT * FROM users WHERE verified = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':status' => $status]); 

        $count = $stmt->rowCount();
        return $count; 
    }

       //gender percentage
       public function genderPer(){
        $sql ="SELECT gender, COUNT(*)AS number  FROM users WHERE gender != '' GROUP BY gender";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }


      //verified/unverified percentage
      public function verifiedPer(){
        $sql ="SELECT verified, COUNT(*)AS number  FROM users  GROUP BY verified";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(); 

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
    }


 //count total system hits by a user
 public function system_hits(){
    $sql ="SELECT hints FROM visitors";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(); 

    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    return $count; 
   }

//fetch all users
   
   public function fetchAllUsers($val){
    $sql ="SELECT * FROM users WHERE deleted !=$val";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(); 

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;


}


}


