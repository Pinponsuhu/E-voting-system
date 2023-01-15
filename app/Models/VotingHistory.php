<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingHistory extends Model
{
    use HasFactory;

    protected $table = 'voting_histories';

    protected $primaryKey = 'id';

    protected $fillable = ['presidency','ojo','epe','ikeja','tresurer','gen_sec','ass_gen_sec','welfare','social','matric_number','faculty','election_id','campus'];
}
