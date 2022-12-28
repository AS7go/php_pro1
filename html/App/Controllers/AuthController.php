<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\Services\Users\CreateService;
use App\Validators\Auth\LoginValidator;
use App\Validators\Auth\SighUpValidator;
use Core\Controller;
use Core\View;

class AuthController extends Controller
{
    public function login()
    {
        View::render('auth/login');
    }

    public function register()
    {
        View::render('auth/register');
    }

    public function signup()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new SighUpValidator();

        if ($validator->validate($fields) && !$validator->checkEmailOnExists($fields['email']) && CreateService::call($fields)) {
            redirect('login');
        }

        View::render('auth/register', $this->getErrors($fields, $validator, ['email_error' => 'Email already exists']));
    }

    public function verify()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new LoginValidator();

        if(AuthService::call($fields, $validator)){
            redirect('admin/dashboard');
        }

        View::render('auth/login', $this->getErrors($fields, $validator, ['email_error' => 'Email already exists']));

    }
}