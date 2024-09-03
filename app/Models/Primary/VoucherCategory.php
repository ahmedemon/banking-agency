<?php

namespace App\Models\Primary;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoucherCategory extends Model
{
    use HasFactory;
    public $fillable = [
        'type',
        'name',
        'active',
    ];

    // public function vouchers()
    // {
    //     return $this->hasMany(Voucher::class);
    // }

    /**
     * Get all of the expenses for the VoucherCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class,'category_id');
    }

    // public function getActiveAttribute($value)
    // {
    //     return $this->attributes['active'] = $value == 1 ? 'Active' : 'Inactive';
    //     $value == 1 ? 'Active' : 'Inactive';
    // }
}
