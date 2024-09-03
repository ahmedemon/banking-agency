<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounts\FixedDiposit;
use Illuminate\Database\Eloquent\SoftDeletes;

class FixedDipositProfit extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'fdr_id', 'withdraw', 'date', 'month', 'year', 'profit',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['balance'];

    public function fdr()
    {
        return $this->belongsTo(FixedDiposit::class, 'fdr_id', 'id');
    }

    //get attribute

    public function getBalanceAttribute()
    {
        $profits = $this->where('fdr_id', $this->fdr_id)->where('id','<=',$this->id)->get();
        return $profits->sum('profit')-$profits->sum('withdraw');
    }

}
