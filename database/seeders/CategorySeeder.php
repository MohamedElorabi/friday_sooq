<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name_ar'=> Str::random(10),
            'name_en'=> Str::random(10),
            'name_ur'=> Str::random(10),
            'name_hi'=> Str::random(10),
            'name_fil'=> Str::random(10),
            'image'=> Str::random(10),
        ]);
    }
}
