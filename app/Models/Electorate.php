<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electorate extends Model
{
    use HasFactory;

    protected $table = 'electorates';

    protected $primaryKey = 'id';

    protected $fillable = ['image','position','fullname','faculty','department','election_id'];
}
