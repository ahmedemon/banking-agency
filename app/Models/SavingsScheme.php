<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SavingsScheme extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'distance', 'note', 'status'];

    /**
     * Get all of the savings for the SavingsScheme
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function savings()
    {
        return $this->hasMany(Savings::class, 'scheme_id', 'id');
    }
}
