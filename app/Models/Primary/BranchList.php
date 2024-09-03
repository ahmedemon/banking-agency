<?php

namespace App\Models\Primary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchList extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','hotline'];
}
