<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FamilyMember;

class FamilyMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $familyMembersRecords = [
        ['id'=>102,'partner_id'=>99,'parent_id'=>0,'father_id'=>0,'mother_id'=>0,'generation'=>3,'relationship_id'=>49,'child_level'=>0,'name'=>'Tn. Laras','gender'=>'Male'],
        ['id'=>103,'partner_id'=>99,'parent_id'=>0,'father_id'=>0,'mother_id'=>0,'generation'=>3,'relationship_id'=>49,'child_level'=>0,'name'=>'Tn. Laras','gender'=>'Male'],
    ];
    FamilyMember::insert($familyMembersRecords);
    }
}
