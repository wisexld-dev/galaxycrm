<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RoleGoalConfig extends Model {
    protected $fillable = ['role_id','goal_id','quantidade','period_days'];
}
