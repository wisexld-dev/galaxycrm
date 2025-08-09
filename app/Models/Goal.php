<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model {
    protected $fillable = ['slug','titulo','config'];
    protected $casts = ['config' => 'array'];
}
