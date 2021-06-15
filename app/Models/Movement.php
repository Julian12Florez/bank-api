<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = ['value','account_id','type_movement'];

    /**
     * Get the account that owns the Movement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeLimitMovements($query)
    {
        return $query->limit(5);
    }
}
