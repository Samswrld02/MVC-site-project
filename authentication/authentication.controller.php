<?php

class Authentication {
    
    public function login($loginData) {
        $location = URLROOT . "/login";

        //generate login form
        // -->

        //validate login using method
        //-->

        //redirect or give access based on result
        //--> using sessions


        if (false) {
            return header("Location: $location");
        }
        // $_SESSION['user_id'] = $username;
        
    }

}
