<?php

//namespace Packages\test\Http\Controllers;
namespace Packages\test\Http\Controllers;
//namespace Packages\test\src\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{

    public function index(){
        return view('welcome');
    }

}



?>