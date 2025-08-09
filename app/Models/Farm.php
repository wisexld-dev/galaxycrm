<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Farm extends Model {
    protected $fillable = ['member_id','item','quantidade','gerente_id','data_recebimento'];

    public function member(): BelongsTo { return $this->belongsTo(Member::class); }
    public function gerente(): BelongsTo { return $this->belongsTo(Member::class, 'gerente_id'); }
}
