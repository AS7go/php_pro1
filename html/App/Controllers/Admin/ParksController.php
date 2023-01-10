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

//        d($this->getErrors($fields, $validator));

        View::render('admin/parks/create', $this->getErrors($fields, $validator));
//        dd($_POST);
    }

    public function edit(int $id)
    {
        $park = Park::find($id); // 1 найти парк по id и редактировать, обновить поля
        View::render('admin/parks/edit', compact('park'));
//        dd($park);
    }

    public function update(int $id)
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new ParksValidator();

//        dd(ParksService::update($id, $fields, $validator));
        if (ParksService::update($id, $fields, $validator)){
            redirect('admin/parks');
        }

        $params = array_merge(
            $this->getErrors($fields, $validator),
            ['park' => (object)$fields]
        );

        View::render('admin/parks/edit', $params);

    }

    public function destroy(int $id)
    {

        Park::find($id)->destroy();
        redirect('admin/parks');
    }
}