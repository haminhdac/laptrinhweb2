<?php

namespace App\Models;



class Category extends \Illuminate\Database\Eloquent\Model
{


       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'categories';

    protected $fillable = ['name','type_name','type_id','type_logo','type_idlogo'];
}
