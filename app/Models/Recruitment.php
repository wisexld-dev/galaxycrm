<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model {
    protected $fillable = ['recruiter_id','recruited_member_id','data'];
}
