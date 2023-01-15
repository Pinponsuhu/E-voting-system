<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $table = 'elections';

    protected $primaryKey = 'id';

    protected $fillable = ['status','election_date', 'starting_time', 'closing_time'];
}
