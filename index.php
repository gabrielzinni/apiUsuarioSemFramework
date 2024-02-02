<?php

include_once __DIR__ . '/App/Services/UserService.php';
include_once __DIR__ . '/App/Models/User.php';
include_once __DIR__ . '/App/config/Db.php';


use App\Services\UserService;


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['id'])){
        $data = UserService::get($_GET['id']);
    }else{
        $data = UserService::get();
    }
    echo json_encode($data);
    exit;

}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $data = UserService::post();
    echo json_encode($data);
    exit;

}else if($_SERVER['REQUEST_METHOD'] == 'PUT'){

    $data = UserService::update();
    echo json_encode($data);
    exit;

}else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

    $data = UserService::delete();
    echo json_encode($data);
    exit;

}else{
    echo "Metodo invalido";
}
        
    