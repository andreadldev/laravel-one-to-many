<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = Type::inRandomOrder()->first();

        $new_project = new Project();
        $new_project->type_id = $type->id;
        $new_project->name = $faker->sentence();
        $new_project->slug = Str::slug($new_project->name, '-');
        $new_project->description = $faker->text(20);
        $new_project->save();
    }
}
