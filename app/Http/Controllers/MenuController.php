<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
    //
    public function index(){
        $menu = Menu::all();
        $options = Menu::all();
        return view('admin.page.menu',['menu'=>$menu,'options'=>$options]);
    }
}
