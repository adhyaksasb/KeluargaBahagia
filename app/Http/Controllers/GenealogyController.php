<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;

class GenealogyController extends Controller
{
    public function genealogy() {
        $members = FamilyMember::with('partner')->where('generation','>','-1')->orderBy('child_level','ASC')->get()->toArray();
        return view('front.genealogy.genealogy', compact('members'));
    }

    public function members() {
        $members = FamilyMember::orderBy('name','ASC')->get()->toArray();
        return view('front.genealogy.members', compact('members'));
    }
}
