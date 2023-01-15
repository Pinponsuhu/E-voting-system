<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $table = 'officials';

    protected $primaryKey = 'id';

    protected $fillable =['user_id', 'name','assigned_faculty','campus','phone_number'];
}
