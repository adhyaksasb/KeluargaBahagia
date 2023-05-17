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

    public function relationship() {
        return $this->belongsTo('App\Models\Relationship', 'relationship_id');
    }

    public function parent() {
        return $this->belongsTo('App\Models\Relationship', 'parent_id');
    }
}
