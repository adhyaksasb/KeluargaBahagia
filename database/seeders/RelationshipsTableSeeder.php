<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Relationship;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relationshipsRecords = [
            ['id'=>20,'family_name'=>"Sutrisno's Family",'male_id'=>39,'female_id'=>43,'number_of_children'=>0],
            ['id'=>21,'family_name'=>"Hariyoko's Family",'male_id'=>40,'female_id'=>44,'number_of_children'=>0],
            ['id'=>22,'family_name'=>"Wiwiek Wahyuningsih's Family",'male_id'=>45,'female_id'=>41,'number_of_children'=>0],
            ['id'=>23,'family_name'=>"Ninik Hariyani's Family",'male_id'=>46,'female_id'=>42,'number_of_children'=>0],
            ['id'=>24,'family_name'=>"Ida Sri Iswari's Family",'male_id'=>52,'female_id'=>47,'number_of_children'=>0],
            ['id'=>25,'family_name'=>"Ida Sri Sulistyowati's Family",'male_id'=>53,'female_id'=>48,'number_of_children'=>0],
            ['id'=>26,'family_name'=>"Haris Suriyadi's Family",'male_id'=>49,'female_id'=>54,'number_of_children'=>0],
            ['id'=>27,'family_name'=>"Ida Sri Sulistyani's Family",'male_id'=>55,'female_id'=>50,'number_of_children'=>0],
            ['id'=>28,'family_name'=>"Agus Hariyadi's Family",'male_id'=>51,'female_id'=>56,'number_of_children'=>0],
            ['id'=>29,'family_name'=>"Sudarto's Family",'male_id'=>57,'female_id'=>63,'number_of_children'=>0],
            ['id'=>30,'family_name'=>"Sudaryono's Family",'male_id'=>58,'female_id'=>64,'number_of_children'=>0],
            ['id'=>31,'family_name'=>"Wahyuningsih's Family",'male_id'=>65,'female_id'=>59,'number_of_children'=>0],
            ['id'=>32,'family_name'=>"Lilik Suharti's Family",'male_id'=>66,'female_id'=>60,'number_of_children'=>0],
            ['id'=>33,'family_name'=>"Budi Santoso's Family",'male_id'=>61,'female_id'=>67,'number_of_children'=>0],
            ['id'=>34,'family_name'=>"Hadi's Family",'male_id'=>68,'female_id'=>72,'number_of_children'=>0],
            ['id'=>35,'family_name'=>"Hanik's Family",'male_id'=>73,'female_id'=>69,'number_of_children'=>0],
            ['id'=>36,'family_name'=>"Wiwin's Family",'male_id'=>74,'female_id'=>70,'number_of_children'=>0],
            ['id'=>37,'family_name'=>"Wina's Family",'male_id'=>75,'female_id'=>71,'number_of_children'=>0],
            ['id'=>38,'family_name'=>"Hardi's Family",'male_id'=>76,'female_id'=>80,'number_of_children'=>0],
            ['id'=>39,'family_name'=>"Ratna's Family",'male_id'=>81,'female_id'=>77,'number_of_children'=>0],
            ['id'=>40,'family_name'=>"Tomy's Family",'male_id'=>78,'female_id'=>82,'number_of_children'=>0],
            ['id'=>41,'family_name'=>"Dian's Family",'male_id'=>83,'female_id'=>79,'number_of_children'=>0],
            ['id'=>42,'family_name'=>"Boby's Family",'male_id'=>84,'female_id'=>86,'number_of_children'=>0],
            ['id'=>43,'family_name'=>"Benny's Family",'male_id'=>85,'female_id'=>87,'number_of_children'=>0],
            ['id'=>44,'family_name'=>"Waty's Family",'male_id'=>89,'female_id'=>88,'number_of_children'=>0],
            ['id'=>45,'family_name'=>"Diaz's Family",'male_id'=>90,'female_id'=>92,'number_of_children'=>0],
            ['id'=>46,'family_name'=>"Penta's Family",'male_id'=>93,'female_id'=>91,'number_of_children'=>0],
            ['id'=>47,'family_name'=>"Daniel's Family",'male_id'=>94,'female_id'=>97,'number_of_children'=>0],
            ['id'=>48,'family_name'=>"Ditto's Family",'male_id'=>95,'female_id'=>98,'number_of_children'=>0],
            ['id'=>49,'family_name'=>"Laras's Family",'male_id'=>101,'female_id'=>99,'number_of_children'=>0],
        ];
        Relationship::insert($relationshipsRecords);
    }
}
