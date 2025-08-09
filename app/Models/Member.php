<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model {
    protected $fillable = ['nome','discord','member_login','member_password'];

    public function farms(): HasMany { return $this->hasMany(Farm::class); }
    public function warnings(): HasMany { return $this->hasMany(Warning::class); }
    public function cashMovements(): HasMany { return $this->hasMany(CashMovement::class); }
    public function warehouseMovements(): HasMany { return $this->hasMany(WarehouseMovement::class); }
}
