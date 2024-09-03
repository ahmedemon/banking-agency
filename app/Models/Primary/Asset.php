<?php

namespace App\Models\Primary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    public $fillable = [
        'date_of_purchase',
        'retired_date',
        'asset_in_year',
        'category',
        'branch',
        'item_name',
        'condition',
        'description',
        'product_cost',
        'model_number',
        'warrenty_gurentee',
        'asset_in_month',
        'supplier_name',
        'dept_type',
        'percent',
        'serial',
        'capture',
        'manual_number',
        'vou_scan_copy',
    ];
}
