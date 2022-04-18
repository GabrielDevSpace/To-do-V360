<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    protected $table = "todoitens";
    use HasFactory;
    protected $fillable = [
        'todo_id',
        'item',
        'prioridade',
        'status',
        'prazo',
        
    ];
}