<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model {
    protected $fillable = ['titulo','imagem','area_risco','contato_responsavel','produto'];
}
