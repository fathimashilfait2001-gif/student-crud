<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // fillable properties for mass assignment-fields(insert,update)
    protected $fillable = ['name', 'email', 'course'];
}
