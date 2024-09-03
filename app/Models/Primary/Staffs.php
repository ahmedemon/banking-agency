<?php

namespace App\Models\Primary;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Staffs extends Model
{
    use HasFactory;
    protected $fillable = [
        'join',
        'name',
        'birthday',
        'father',
        'mother',
        'nid',
        'gender',
        'mobile',
        'address',
        'designation',
        'picture',
        'sign',
        'publish',
        'user_role',
        'branch',
        'active',
        'interview',
        'security_money',
        'salary',
        'house',
        'medical',
        'convenience',
        'transport',
        'mobile_bill',
    ];

    protected $appends = ['staff_image'];

    public function role(){
        return $this->hasOne(StaffRole::class, 'id', 'user_role');
    }

    public function branch_op(){
        return $this->belongsTo(BranchList::class, 'branch','id');
    }

    /**
     * Get the area associated with the Staffs
     */
    // public function area()
    // {
    //     return $this->belongsTo(Area::class, 'id', 'associate_id');
    // }
    public function area()
    {
        return $this->belongsTo(Area::class,'id', 'associate_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function getStaffImageAttribute() {
        $staff_image = 'storage/uploads/staff/' . $this->picture;
        $default_image = 'images/staff-image.png';
        return empty($this->picture) ? $default_image : $staff_image;
    }
}
