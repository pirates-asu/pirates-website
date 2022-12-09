<?php
require "utils.php";
class DB {
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="learntoearn";
    public $connection;

    function __construct() {
        $this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if(!($this->connection)){
            die("Connection Failed");
        }
    }

    function signup($submit,$username,$password1,$password2,$email,$address,$country,$name){

        if(isset($submit) && empty_check($username)&&empty_check($password1)&&empty_check($email)&&empty_check($address)&&empty_check($country)&&empty_check($name)){

            if($this->PasswordCheckForRegestiration($password1,$password2) == 1 &&$this->EmailAvaiableForRegestiration($email) == 1&& $this->UsernameAvaiableForRegestiration($username) == 1 ){
                $query="INSERT INTO user (uusername, upassword, uemail, uname, uaddress, ucountry, urole) VALUES('$username','".md5($password1)."','$email','$name','$address','$country', 1)";
                $result = mysqli_query($this->getConnection(),$query);
                return 1;
        
            }else{
                return "Your data is duplicated";
            }
        
        }else{
            return "Please enter complete data";
        }

    }

    function login($submit,$username,$password){
        if(isset($submit) && empty_check($username)&&empty_check($password)==1){

            $query="SELECT * FROM user WHERE uusername='".$username."' AND upassword='".md5($password)."'";
            
            if(mysqli_num_rows(mysqli_query($this->connection,$query))==1){
                //there exist a user with these credentials
                return 1;
                
            }else{
                //there is no user with these credentials
                return "please enter valid credentials";
            }
        }else{
                //missing data
                return "Please enter complete data";
        }
    }

    function getConnection(){
        return $this->connection;
    }

    function UsernameAvaiableForRegestiration($username){
        $query="SELECT * FROM user WHERE uusername='".$username."'";
        $result  = mysqli_query($this->getConnection(),$query);
        if(mysqli_num_rows($result)){
            return 0;
            
        }else{
            return 1;
            
        }
    }

    function PasswordCheckForRegestiration($password1,$password2){
        if($password1===$password2){
            return 1;
        }else{
            return 0;
            
        }
    }


function EmailAvaiableForRegestiration($email){
    $query="SELECT * FROM user WHERE uemail='".$email."'";
    $result  = mysqli_query($this->getConnection(),$query);
    if(mysqli_num_rows($result)){
        return 0;
        
    }else{
        return 1;
        
    }
}



}

?>