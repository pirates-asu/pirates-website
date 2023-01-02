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

            if($this->isPasswordAvailable($password1,$password2) == 1 &&$this->isEmailAvailable($email) == 1&& $this->isUsernameAvailable($username) == 1 ){
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
          $res = mysqli_query($this->connection, $query);
          if(mysqli_num_rows($res)==1){
              //there exist a user with these credentials
              return [1, $res->fetch_assoc()['urole']];

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

    function isUsernameAvailable($username){
        $query="SELECT * FROM user WHERE uusername='".$username."'";
        $result  = mysqli_query($this->getConnection(),$query);
        if(mysqli_num_rows($result)){
            return 0;

        }else{
            return 1;

        }
    }

    function getUserCount($cid){
        $query= "SELECT COUNT(*) FROM enrollment WHERE cid='".$cid."'";
        $result  = mysqli_query($this->getConnection(),$query);
        $data = mysqli_fetch_assoc($result);
        return $data["COUNT(*)"];
    }

    function setUserCount($cid,$count){
        $query = "UPDATE course SET cstudentcount='$count' WHERE cid ='$cid'";
        $result  = mysqli_query($this->getConnection(),$query);
    }

    function isPasswordAvailable($password1,$password2){
        if($password1===$password2){
            return 1;
        }else{
            return 0;

        }
    }

    function isEmailAvailable($email){
      $query="SELECT * FROM user WHERE uemail='".$email."'";
      $result  = mysqli_query($this->getConnection(),$query);
        if(mysqli_num_rows($result)){
            return 0;

        }else{
            return 1;

        }
    }
    
    function addCourse($c_name, $c_desc, $c_link, $c_imag,  $c_studs, $c_track) {
      $sql_insert_course =
      "INSERT INTO `course` (cname, cdescription, clink, imglink, cstudentcount, pid)
      VALUES('$c_name', '$c_desc', '$c_link', '$c_imag', '$c_studs', '$c_track')";
      if (mysqli_query($this->getConnection(), $sql_insert_course)) {
          return true;
      } else {
          return false;
      }
    }

    function addVideo($v_name, $v_link, $c_id) {
      $sql_insert_vid =
      "INSERT INTO `video` (vname, vlink, cid)
      VALUES('$v_name', '$v_link', $c_id)";
      if (mysqli_query($this->getConnection(), $sql_insert_vid)) {
          return true;
      } else {
          return false;
      }
    }

    function removeCourse($courseID) {
      $this->removeVideo(NULL, $courseID);
      if ($courseID) {
          $sql_remove = "DELETE FROM `course` WHERE `course`.`cid` = $courseID";
          if (mysqli_query($this->getConnection(), $sql_remove)) {
              return true;
          } else {
              return false;
          }
      } else {
          return false;
      }
    }

    function removeVideo($videoID, $courseID) {
      if ($videoID) {
          $sql_remove = "DELETE FROM `video` WHERE `video`.`vid` = $videoID";
          if (mysqli_query($this->connection, $sql_remove)) return true;
      } elseif ($courseID) {
          $sql_remove = "DELETE FROM `video` WHERE `video`.`cid` = $courseID";
          if (mysqli_query($this->connection, $sql_remove));
          return true;
      } else {
          return false;
      }
    }

    function getList($vid1course0) {
      if ($vid1course0 == 1) {
          $sql = "SELECT vid, vname FROM video";
          $col1 = 'vid';
          $col2 = 'vname';
      } else {
          $sql = "SELECT cid, cname FROM course";
          $col1 = "cid";
          $col2 = "cname";
      }
      $r = mysqli_query(
          $this->getConnection(),
          $sql
      );

      $result_col1 = [];
      $result_col2 = [];
      while ($array = mysqli_fetch_array($r)) {
          $result_col1[] = $array[$col1];
          $result_col2[] = $array[$col2];
      }
      $result = [[]];

      for ($i = 0; $i < count($result_col1); $i++) {
          array_push($result,
          [$result_col1[$i], $result_col2[$i]]);
      }
      return array_slice($result, 1);
    }

    function escapeString($cmd) {
      return
          mysqli_real_escape_string($this->getConnection(), $cmd);
    }

    function getTracks() {
      return
      [
          [1, "Front End"],
          [2, "Back End"],
          [3, "Data Science"],
          [4, "Mobile Developement"]
      ];
    }


    function showCourses(){
      
      $pid = $_GET["pid"];

      if(isset($_SESSION["username"])){
        $uname = $_SESSION["username"];
        $user = mysqli_query($this -> getConnection(), "SELECT uid FROM user WHERE uusername='$uname'");
        $urow = mysqli_fetch_array($user,MYSQLI_ASSOC);
        $uid = $urow["uid"];
        $enrolled_course = mysqli_query($this -> getConnection(), "SELECT eid,enrollment.cid FROM course,enrollment,user WHERE user.uid = enrollment.uid and enrollment.cid = course.cid and pid = $pid and user.uusername = '$uname'");
      }

      $result = mysqli_query($this -> getConnection(), "SELECT cid,cname,cdescription,imglink FROM course WHERE pid = $pid");
      if(isset($_SESSION["username"])){
        $query = array("result" => $result,
                    "pid" => $pid,
                    "uname" => $uname,
                    "user" => $user,
                    "urow" => $urow,
                    "uid" => $uid,
                    "enrolled_course" => $enrolled_course
      );
      }else{
        $query = array("result" => $result,
                    "pid" => $pid,
      );
      }
      return $query;
    }  

    function showCourseName(){
      $cid = $_GET["cid"];
      if(isset($_SESSION["username"])==False){
        header('Location:login.php');
      }
      $uname = $_SESSION["username"];

      $result = mysqli_query($this -> getConnection(), "SELECT cname FROM course WHERE cid = $cid");
      $user = mysqli_query($this -> getConnection(), "SELECT uid,uemail FROM user WHERE uusername='$uname'");
      $enrolled_course = mysqli_query($this -> getConnection(), "SELECT cid FROM enrollment,user WHERE user.uid = enrollment.uid and cid = $cid and uusername = '$uname'");
      $videos = mysqli_query($this -> getConnection(), "SELECT vname,vlink FROM video WHERE cid = $cid");

      $row1 = mysqli_fetch_array($enrolled_course,MYSQLI_ASSOC);
      $cname = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $urow = mysqli_fetch_array($user,MYSQLI_ASSOC);
      if(is_null($row1)){
        $uid = $urow["uid"];
        $usercount= $this->getUserCount($cid);
        $this->enrollUser($uid,$cid);
        $usercount++;
        $this->setUserCount($cid,$usercount,$urow["uemail"]);
       
      }
      return $cname;
    }

    function enrollUser($uid,$cid){
        $sql = "INSERT INTO enrollment (eid, uid, cid)
        VALUES (NULL, $uid, $cid)";
        mysqli_query($this -> getConnection(), $sql);
    }

    function showVideo(){
      $cid = $_GET["cid"];
      $uname = $_SESSION["username"];
      if(isset($_SESSION["username"])==False){
        header('Location:login.php');
      }
      $result = mysqli_query($this -> getConnection(), "SELECT cname FROM course WHERE cid = $cid");
      $user = mysqli_query($this -> getConnection(), "SELECT uid FROM user WHERE uusername='$uname'");

      $enrolled_course = mysqli_query($this -> getConnection(), "SELECT cid FROM enrollment,user WHERE user.uid = enrollment.uid and cid = $cid and uusername = '$uname'");
      $videos = mysqli_query($this -> getConnection(), "SELECT vname,vlink FROM video WHERE cid = $cid");

      $row1 = mysqli_fetch_array($enrolled_course,MYSQLI_ASSOC);
      $cname = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $urow = mysqli_fetch_array($user,MYSQLI_ASSOC);
      if(is_null($row1)){
        $uid = $urow["uid"];
        $sql = "INSERT INTO enrollment (eid, uid, cid)
        VALUES (NULL, $uid, $cid)";
        mysqli_query($this -> getConnection(), $sql);
      }
      return $videos;
    }
}
?>
