<?php

use LDAP\Result;

require_once 'config.php';

        class Auth extends Database{
            
            //reg new user

            public function register($name, $teacherid,$email, $region,$password){
                $sql= "INSERT INTO users(name,teacher_id,email,region,password) VALUES(:name, :teacherid, :email, :region, :pass)";
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute(['name' => $name, 'teacherid' => $teacherid, 'email' => $email, 'region' => $region, 'pass' => $password]);

                return true;

            }

            //check if user already exists 

            public function user_exist($email) {  
                $sql = "SELECT  email FROM users WHERE email =  :email";
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute(['email' => $email]); 
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                return $result;
                

            }

            //login exsts

            public function login($email)   {   
                $sql = "SELECT  email,password FROM users WHERE email =  :email AND  deleted <>0";   
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':email' => $email]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;


            }

            //current user in session

            public function currentUser($email) {
                $sql = "SELECT * FROM users WHERE email = :email AND deleted <>0";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':email' => $email]);

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;    
            }
        //forgot password

        public function forgot_password($token, $email){
            $sql =  "UPDATE users SET token= :token, token_expire = DATE_ADD(NOW(), 
            INTERVAL 10  MINUTE) WHERE email= :email";  

            $stmt = $this->conn->prepare($sql);
            $stmt ->execute(['token' => $token, 'email' => $email]);
            
            return true;
            
            
        }
//reset pass user auth
        public function reset_pass_auth($email,$token ){
            $sql = "SELECT id FROM users WHERE email = :email AND token = :token AND token !='' AND token_expire > NOW() AND deleted != 0";
            $stmt =$this-> conn->prepare($sql);
            $stmt->execute(['email' => $email, 'token' => $token]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $row;

        }
// update new password

        public function update_new_password($pass, $email){
            $sql= "UPDATE users SET token ='', password =:pass WHERE email = :email AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt ->execute(['pass' => $pass, 'email' => $email]);

            return true;

        }
//add request

public function add_New_Request($uid, $schoolname, $xperience, $combination,  $schoolAddress,  $regionTo, $districtTo,  $schoolTo, $reason){
$sql = "INSERT INTO requests (uid, schoolname, experience, branch, schoolAddress, regionTo, district, schoolTo, reason) VALUES(:uid, :schoolname, :xperience, :combination, :schoolAddress, :regionTo, :districtTo, :schoolTo, :reason)";
$stmt = $this->conn->prepare($sql);
$stmt->execute(['uid'=>$uid, 'schoolname' => $schoolname, 'xperience'=>$xperience, 'combination'=>$combination, 'schoolAddress'=>$schoolAddress, 'regionTo'=>$regionTo, 'districtTo'=>$districtTo, 'schoolTo'=>$schoolTo, 'reason'=>$reason ]);

return true;

}

//fetch all reqqq

public function get_requests($uid){
    $sql = "SELECT * FROM requests WHERE uid = :uid";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['uid' => $uid]);

   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return $result;
    

}

//edit user requests
public function edit_request($id){
    $sql = "SELECT * FROM requests WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);

    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
//update req

public function update_request($id, $schoolname, $xperience, $combination,  $schoolAddress,  $regionTo, $districtTo,  $schoolTo, $reason){
    $sql = "UPDATE requests SET schoolname= :schooname,  experience = :experience, branch = :combination, schoolAddress= :schoolAd, regionTo = :regionTo, district= :districtTo, schoolTo= :schoolTo, reason = :reason, updated_at = NOW() WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['schoolname'=> $schoolname, 'experience' =>$xperience, 'combination'=>$combination, 'schoolAddress'=>$schoolAddress, 'regionTo'=>$regionTo, 'district'=>$districtTo,  'schoolTo'=>$schoolTo, 'reason'=>$reason , 'id'=>$id ]);
    
     return true;

        }   

//delete a requesttt

public function delete_req($id){
    $sql= "DELETE FROM requests WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    return true;
}

//update profile of a user
public function update_profile($name,$gender,$dob,$phone,$photo,$id){
    $sql = "UPDATE users SET name =:name, gender = :gender, dob = :dob, phone = :phone, photo = :photo     WHERE id = :id AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['name'=>$name, 'gender'=>$gender, 'dob'=>$dob, 'phone'=>$phone, 'photo'=>$photo,'id'=>$id]);
   return true; 

}

//change password
public function change_password($pass, $id){
    $sql="UPDATE users SET password = :pass WHERE id = :id AND deleted != 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['pass' => $pass, 'id' => $id]);
    return true;
}

//email verification

public function verify_email($email){
  $sql = "UPDATE users SET verified = 1 WHERE email  = :email AND deleted != 0 ";  
  $stmt = $this->conn->prepare($sql); 
  $stmt->execute([':email' => $email]);
  return true; 
}



//send feedback to admin
public function send_Feedback($sub, $feed, $uid){
    $sql = "INSERT INTO feedback (uid, subject, feedback) VALUES (:uid, :sub :feed)";
    $stmt =$this->conn->prepare($sql);
    $stmt->execute(['uid' =>$uid, 'sub' =>$sub, 'feed' =>$feed]);
    return true;  
}


//insert notification
public function notification($uid,$type,$message){
    $sql = "INSERT INTO notification(uid,type,message) VALUES (:uid,:type,:message)";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute(['uid' => $uid, 'type' => $type, 'message' => $message]);

    return true;
}
 

//fetch notinicationsssssssssssss
  public function fetchNotification($uid){
    $sql = "SELECT * FROM notification WHERE uid = :uid AND type ='user'";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute(['uid' => $uid]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
   return $result;
  }

//remove notifications
public function removeNotification($id){
    $sql = "DELETE FROM notification WHERE id = $id AND type='user'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    return true;
}








//end of the auth class
    }

