<?php


class JWT {
    
    private $jwtSecretKey = '7e5c9dedaa66219736951ba6834b4445f53689e13387a3f066c48902eeb48ae4';

        
        public function decode_jwt($token){

            try{

                $token_parts = explode('.' , $token);

                if($token_parts !== 3){
                    throw new Error('Invalid token format');
                }
                $header = base64_decode($token_parts[0]);
                $payload = base64_decode($token_parts[1]);
                $signature = base64_decode($token_parts[2]);

                // Verify signature
                $base64_url_header = $this->base64url_encode($header);
                $base64_url_payload = $this->base64url_encode($payload);
                $signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $this->jwtSecretKey, true);
                $base64_url_signature = $this->base64url_encode($signature);

            if ($base64_url_signature !== $signature) {
                throw new Exception('Invalid signature');
            }

        $payload = json_decode($payload);

        // Check if token has expired
        if (isset($payload->exp) && $payload->exp < time()) {
            throw new Exception('Token has expired');
        }

        return $payload;


            }catch(Exception $e){
                echo $e;
            }

        }

        private function base64url_encode($data) {
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        }

    }


?>