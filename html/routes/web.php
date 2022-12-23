<?php

// /
// /login
// /dashboard
// /parks - index
// /parks/4 - show
// /parks/4/edit - edit
// /parks/4/update - update
// /parks/create - create
// /parks/store - store
// /parks/4/destroy - delete

$router->add('parks/{id:\d+}/update', [
    'controller' => 'Controller',
    'action' => 'index',
    'method' => 'POST'
]);

//$router->add('parks/{id:\d+}/update',[
//    'controller'=>ParksController::class,
//    'action'=>'update',
//    'method'=>'POST'
//]);

//$router->add('parks/{slug:\w+}/update',[
//    'controller'=>ParksController::class,
//    'action'=>'update',
//    'method'=>'POST'
//]);
