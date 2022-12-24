<?php

namespace App\Controllers;

use Core\Controller;

class ParksController extends Controller
{
    public function show(int $id)
    {
        d($id);
    }

//    public function before(string $action): bool
//    {
//        return false;
//    }
}