<?php

    session_name("eduwebclientui_session");
    session_start();

    // print_r($_SESSION);

    if(isset($_SESSION['token']) && isset($_SESSION['role'])){
        if($_SESSION['role'] === 'teacher'){
            header('Location: ./teacher-profile.php');
            exit;
        }
        
        if($_SESSION['role'] === 'student'){
            header('Location: ./student-profile.php');
            exit;
        }
    }

    if(isset($_POST['submit'])){

        $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $encoded = json_encode(['email' => $email, 'password' => $password]); 

        try{

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost/eduwebbackend/login.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $encoded
            ]);

            $resp = curl_exec($curl);
            $decoded = json_decode($resp, true);

            $id = isset($decoded['data']['user_id']) ? $decoded['data']['user_id'] : null;
            $token = isset($decoded['data']['token']) ? $decoded['data']['token'] : null;
            $username = isset($decoded['data']['username']) ? $decoded['data']['username'] : null;
            $email = isset($decoded['data']['email']) ? $decoded['data']['email'] : null;
            $role = isset($decoded['data']['role']) ? $decoded['data']['role'] : null;

            $_SESSION['token'] = $token;
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            if(!$id || !$token || !$username || !$email || !$role){
                echo 'Invalid login crediential';
                exit;
            }
            
            // print_r($_SESSION);

            // var_dump($role);

            if($role == 'student'){
                header('Location: ./courses.php');
                exit;
            }

            if($role == 'teacher'){
                header('Location: ./teacher-profile.php');
                exit;
            }

            curl_close($curl);

            // echo $_SERVER['PHP_SELF'];
            // echo session_name();

        }catch(Exception $e){
            // echo $e;
            echo $e;
            // header('Location: ./login.php');
            exit;
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduLearn</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="">
            <h2>Login to EduLearn</h2>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="login-submit-btn">Login</button>
            Don't have an account? Register First <a href="./register-student.php">As Learner</a> or <a href="./register-teacher.php">As Instructor</a>
            <p class="login-links">
                <a href="#">Forgot Password?</a>
                <a href="./index.html">Back to Home</a>
            </p>
        </form>
    </div>
</body>
</html>