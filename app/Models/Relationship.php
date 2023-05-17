<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    public function male() {
        return $this->belongsTo('App\Models\FamilyMember', 'male_id');
    }

    public function female() {
        return $this->belongsTo('App\Models\FamilyMember', 'female_id');
    }
}
