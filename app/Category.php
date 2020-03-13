<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; //tuy chinh ten bang csdl

    // Định nghĩa relationship - mqh
    public function parent()
    {
    	return $this->belongsTo("App\Category","parent_id");
    }
}
