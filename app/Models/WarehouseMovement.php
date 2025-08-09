<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class WarehouseMovement extends Model {
    protected $fillable = ['tipo','item_id','quantidade','descricao','member_id'];
}
