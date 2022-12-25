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

    function ShowCourses(){
    $pid = $_GET["pid"];

    if(isset($_SESSION["username"])){
      $uname = $_SESSION["username"];
      $user = mysqli_query($this -> getConnection(), "SELECT uid FROM user WHERE uusername='$uname'");
      $urow = mysqli_fetch_array($user,MYSQLI_ASSOC);
      $uid = $urow["uid"];

      $enrolled_course = mysqli_query($this -> getConnection(), "SELECT enrollment.cid FROM course,enrollment,user WHERE user.uid = enrollment.uid and enrollment.cid = course.cid and pid = $pid and user.uusername = '$uname'");
    }

    $result = mysqli_query($this -> getConnection(), "SELECT cid,cname,cdescription,clink,imglink FROM course WHERE pid = $pid");

    for($i=0;$i<mysqli_num_rows($result);$i++){
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      if(isset($_SESSION["username"])){
        $row1 = mysqli_fetch_array($enrolled_course,MYSQLI_ASSOC);
      }else{
        $row1 = NULL;
      }


      if($i%2 == 0){
        echo '<div class="box">';
        echo "<img src=\"",$row["imglink"],'"';
        echo 'style="height:300px;width:470px;margin-left:10em;">';
      }else{
        echo '<div class="rbox">';
        echo "<img src=\"",$row["imglink"],'"';
        echo 'style="height:300px;width:470px;margin-right:10em;">';
      }
      echo '<div class="txtbox">';
      echo '<div class="desc">';
      echo ucfirst($row["cname"]);
      echo '</div>';
      echo '<div class="desc1">';
      echo $row["cdescription"];
      echo '</div>';
      echo '<div class="butbox">';
      if(isset($_SESSION["username"])){
        echo '<a href="CoursesContent.php?pid=',$pid,'&cid=',$row["cid"],'" class="button button1" target="_blank">';
        if(is_null($row1)){
          echo 'ENROLL NOW'; #String Refactoring
        }else{
          echo 'LEARN ', strtoupper($row["cname"]); #String Refactoring
        }
      }else{
        echo '<a href="login.php" class="button button1">';
        echo 'ENROLL NOW'; #String Refactoring
      }
      echo '</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    mysqli_free_result($result);
    if(isset($_SESSION["username"])){
      mysqli_free_result($enrolled_course);
    }

    for($i=0;$i<6;$i++){
      echo '</div>';
    }
  }

  function ShowVidsQuery_CourseName(){
    $cid = $_GET["cid"];
    $uname = $_SESSION["username"];
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
    return $cname;
  }

  function ShowVidsQuery_Video(){
    $cid = $_GET["cid"];
    $uname = $_SESSION["username"];
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

  function ShowCourseName(){
    $cname= $this -> ShowVidsQuery_CourseName();
    echo $cname["cname"];
  }

  function ShowFirstVid(){
    $videos = $this -> ShowVidsQuery_Video();
    if(is_null($videos)){

      $first_video["vlink"] = "";
      $first_video["vname"] = "Course Coming Soon";
    }else{
      $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
    }
  }
  function ShowFirstVid_name(){
    $videos = $this -> ShowVidsQuery_Video();
    $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
    if(is_null($first_video)){
      $first_video["vlink"] = "";
      $first_video["vname"] = "Course Coming Soon";
    }
    return $first_video["vname"];
  }
  function ShowFirstVid_link(){
    $videos = $this -> ShowVidsQuery_Video();
    if(is_null($videos)){

      $first_video["vlink"] = "";
      $first_video["vname"] = "Course Coming Soon";
    }else{
      $first_video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
    }
    return $first_video["vlink"];
  }

  function ShowVids(){
    $videos = $this -> ShowVidsQuery_Video();
    $video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
    if(isset($videos)){
    for($i=0;$i<mysqli_num_rows($videos)-1;$i++){
      $video = mysqli_fetch_array($videos,MYSQLI_ASSOC);
      echo '<div class="vid">';
      echo '<iframe width="200" height="100" src="',$video["vlink"],'"
      class="list-video"></iframe>';
      echo '<h3 class="title">',$video["vname"],'</h3>';
      echo '</div>';
    }
  }
  }
}
?>
