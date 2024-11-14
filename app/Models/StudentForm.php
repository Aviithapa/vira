<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentForm extends Model
{
    use HasFactory, SoftDeletes;
    

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'district',
        'mobile_number',
        'email',
        'photo',             // for storing photo path if uploaded
        'gender',
        'program',
        'shift',
        'college_name',
        'school_type',        // added for school type selection
        'father_name',        // father/mother name
        'father_contact',     // father/mother contact number
        'notes',              // additional notes
        'terms_accepted',  
       'login_credentials_generated' ,
       'user_id',    // accept terms and conditions checkbox
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
