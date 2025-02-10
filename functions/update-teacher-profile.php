<?php

    require __DIR__ . "/env.php";

    session_name("eduwebclientui_session");
    session_start();

    if (!isset($_SESSION['token']) || !isset($_SESSION['user_id'])) {
        echo 'Session variables are missing.';
        exit;
    }

    if (isset($_POST['submit'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $image = $_FILES['image'];

        
            // Prepare multipart data
            $encoded = [
                'username' => $username,
                'image' => $image
            ];

            $url = $SELF_API_BASE_URL . "update-profile.php";

            try {
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POSTFIELDS => json_encode($encoded), // Send as multipart
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer ' . $_SESSION['token'],
                        'user_id: ' . $_SESSION['user_id']
                    ]
                ]);

                $resp = curl_exec($curl);
                $decoded = json_decode($resp, true);

                // print_r($resp);

                header('Location: ../index.php');

                curl_close($curl);

            } catch (Exception $e) {
                header('Location: ../index.php');
                echo 'Exception: ' . $e->getMessage();
            }
        
    }

?>
