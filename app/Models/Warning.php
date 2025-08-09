<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model {
    protected $fillable = ['member_id','motivo','autor_id'];
}
