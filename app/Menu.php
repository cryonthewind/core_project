<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'tbl_menu';
    protected $fillable = ['menu_id','menu_title','menu_link','menu_parent_id'];
}
