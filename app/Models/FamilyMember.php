<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    public function partner() {
        return $this->belongsTo('App\Models\FamilyMember', 'partner_id');
    }
}
