<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;
use Carbon\Carbon;

class GenealogyController extends Controller
{
    public function genealogy() {
        $members = FamilyMember::with('partner')->where('genealogy','Biological')->orderBy('child_level','ASC')->get()->toArray();
        return view('front.genealogy.genealogy', compact('members'));
    }

    public function members() {
        $dateOfBirth = '1994-07-02';
        $years = Carbon::parse($dateOfBirth)->age;
        $members = FamilyMember::orderBy('name','ASC')->get()->toArray();
        return view('front.genealogy.members', compact('members'));
    }
}
