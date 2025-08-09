<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CashMovement extends Model {
    protected $fillable = ['tipo','valor','descricao','member_id'];
}
