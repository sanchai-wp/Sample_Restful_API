<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    public $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'subject', 'content', 'status',
    ];
    
}
