<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'subject', 'content', 'status',
    ];
    public $primarykey = 'id';
    public $timestamps = true;
}
