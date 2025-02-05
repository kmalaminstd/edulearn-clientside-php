
<?php

    if (!isset($_POST['submit'])) {
        echo "Submit button not pressed.";
    } else {

        try{

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $encoded = json_encode(['username' => $username, 'email' => $email, 'password' => $password, 'role_id' => 2]);
    
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost/eduwebbackend/registration.php',
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => $encoded
            ]);
    
            $resp = curl_exec($curl);
            $decoded = json_decode($resp);

            // print_r($decoded);

            header('Location: ../../login.php');

            curl_close($curl);

        }catch(Exception $e){

            header('Location: ./register-teacher.php');

        }
        



    }

?>
