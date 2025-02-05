<?php
   
   if(session_status() === PHP_SESSION_NONE){
        session_name("eduwebclientui_session");
        session_start();
    }

    if(isset($_POST['course_enroll_btn'])){

        

        try{
            
            $course_id = json_decode($_POST['course_id']);

            if(!$course_id){
                throw new Error('Course id is invalid');
            }

            // echo $course_id;
    
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost/eduwebbackend/enroll-course.php',
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => ['course_id' => $course_id], 
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $_SESSION['token'],
                    'student_id: ' . $_SESSION['user_id']
                ],
                
            ]);
    
            $resp = curl_exec($curl);
            $decoded = json_decode($resp, true);

            var_dump($decoded);

            curl_close($curl);

            header('Location: ../../student-profile.php');

    
        }catch(Exception $e){
            echo $e;
        }
    }



?>