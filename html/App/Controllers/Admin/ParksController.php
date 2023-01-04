<?php

namespace App\Controllers\Admin;

use App\Models\Park;
use App\Services\ParksService;
use App\Validators\ParksValidator;
use Core\View;

class ParksController extends BaseController
{
    public function index()
    {
        $parks = Park::all();
//        dd($parks);
        View::render('admin/parks/index', compact('parks'));
    }
    // public function show(int $id){}
    public function create()
    {
        View::render('admin/parks/create');

    }

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new ParksValidator();

        if (ParksService::create($fields, $validator)){
            redirect('admin/parks');
        }

<<<<<<< HEAD
        dd($this->getErrors($fields, $validator));
=======
//        dd($this->getErrors($fields, $validator));
>>>>>>> fc835eb845b1f8d93aa9486b5b5980db0a1213d2

        View::render('admin/parks/create', $this->getErrors($fields, $validator));
//        dd($_POST);
    }

    public function edit(int $id)
    {

    }

    public function update(int $id)
    {

    }

    public function destroy(int $id)
    {

    }
}