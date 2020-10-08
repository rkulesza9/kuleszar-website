<?php

  $email_hash_alg = 'gost';
  $password_hash_alg = 'gost';

  function resetPassword(){
    include 'dbconfig.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $submit = $_POST['reset_password'];

    global $email_hash_alg, $password_hash_alg;

    if(isset($submit)){
      $sql = "select username, id, password from users where username=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$username);
      $stmt->bind_result($un_db,$id,$pw_db);
      $stmt->execute();
      $stmt->fetch();
      $stmt->close();

      //check Username
      if($username == $un_db){
        //check $password
        $hash_password = hash($password_hash_alg,$password.$username);
        if($hash_password == $pw_db){
          $sql = "update users set password = ? where id=?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("si",hash($password_hash_alg,$new_password.$username),$id);
          $stmt->execute();
          $stmt->fetch();
          $rows_aff = $stmt->affected_rows;
          $stmt->close();

          if($rows_aff > 0) echo "<p style='color:green;'>Your password was changed successfully!</p>";
          else echo "<p style='color:red;'>Your password was not changed.</p>";
        } else {
          echo "<p style='color:red;'>The password you typed was incorrect</p>";
        }
      }else {
          echo "<p style='color:red;'>The username you typed was not found</p>";
      }
    }
  }

  function logout(){
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("location: login.php");
  }

  function loginToService($service,$uses_otp){
    include 'dbconfig.php';
    require_once 'random_compat-2.0.18/lib/random.php';
    global $email_hash_alg, $password_hash_alg;
    if(isset($_POST['submit'])){
      //detect when the last otp was generated (last_otp) (must be within 30 minutes)
      $username = $_POST['username'];
      $password = $_POST['password'];
      $now = date('Y-m-d H:i:s');
      $sql = "select id,last_otp,password from users where username=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$username);
      $stmt->bind_result($id,$last_otp,$password_db);
      $stmt->execute();
      $stmt->fetch();
      $stmt->close();
      $last_otp = new DateTime($last_otp);
      $now = new DateTime($now);
      $diff = $now->getTimestamp() - $last_otp->getTimestamp();
      $time_limit = 30*60;
      if($uses_otp == false || (0 <= $diff && $diff <= $time_limit)){
        //detects if password is correct
        $password_hash = hash($password_hash_alg,$password.$username) ;
        if($password_hash == $password_db){
          //does user have permission?
          $sql = "select name from services where id in (select s_id from service_permission where u_id=(select id from users where username=?)) and name='$service'";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s",$username);
          $stmt->bind_result($service1);
          $stmt->execute();
          $stmt->fetch();
          $stmt->close();
          if(isset($service1)){
            //creates session (with user id)
            header("Location: index.php");
            session_start(); //session_unset(), session_destroy()
            $_SESSION['user_id'] = $id;
            $_SESSION['otp_stuff'] = "<p>last otp: ".$last_otp->format("y-m-d h:i:s")."<br>login: ".$now->format("y-m-d h:i:s")."<br>Timeout: ".($time_limit/60 - $diff/60)."</p>";
            $_SESSION['service'] = $service;
          } else {
            echo "<p style='color:red;'>You do not have permission to access this page.</p>";
          }

        }else {
          echo "<p style='color:red;'>Username or Password was incorrect! Try requesting a new password!</p>";
        }
      }else{
        echo "<p style='color:red;'>Login Interval ended, request a new OTP</p>";
      }

    } elseif($uses_otp && isset($_POST['gen_otp'])){
      //check that email matches
      $username = $_POST['username'];
      $email = $_POST['email'];
      $sql = "select email from users where username=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$username);
      $stmt->bind_result($email_fromdb);
      $stmt->execute();
      $stmt->fetch();
      $stmt->close();
      $email_hashed = hash($email_hash_alg,$email.$username);
      if($email_fromdb == $email_hashed){

            //set status to open
            //sets last otp to current DateTime
            $last_otp = date("Y-m-d H:i:s");

            $sql = "update users set last_otp=? where username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$last_otp,$username);
            $stmt->execute();
            $stmt->close();

            //generates OTp
            $otp = bin2hex(random_bytes(10));
            //echo "password: $otp";

            //saves otp
            $otp_hash = hash($password_hash_alg,$otp.$username);
            $sql = "update users set password=? where username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$otp_hash,$username);
            $stmt->execute();
            $stmt->close();

            //sends otp in email
            $toEmail = $_POST['email'];

            $fromEmail = "robertkulesza@kuleszar.com";
            $subject = "kuleszar.com/$service OTP Request";
            $message = "username: $username\npassword: $otp";
            $headers = "From: $fromEmail";


            mail($toEmail,$subject,$message,$headers);
            echo "username: $username<br>password: $otp";
          } else {
            echo "<p style='color:red;'>The email <b>$email</b> is not associated with the username <b>$username</b>";
          }
      }
  }

  function sessionExistsForService($service){
    include 'dbconfig.php';
    require_once 'random_compat-2.0.18/lib/random.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    $service2 = $_SESSION['service'];

    return isset($user_id) && isset($service) && $service2 == $service;
  }

  ?>
