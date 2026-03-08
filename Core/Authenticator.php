<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();


        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }

        return false;
    }


    public function login($user)
    {
        // now as the user log in i have to mark that by using session
        $_SESSION['user'] = [
            'email' => $user['email'],
        ]; // user array

        session_regenerate_id(true); // regenarete an unique id for each login
    }

    public function logout()
    {
        Session::destroy();    }
}
