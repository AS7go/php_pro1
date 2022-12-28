<?php

namespace App\Controllers;

use App\Services\Users\CreateService;
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

        $data['data'] = $fields;
        $data += array_merge($validator->getErrors(), ['email_error' => 'Email already exists']);

        dd($data);
        View::render('auth/register', $data);
    }
}