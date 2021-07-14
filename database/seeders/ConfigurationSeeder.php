<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('CONFIGURATIONS')->insert([
            'NAME' => "MODERATED_EMAILS",
            'VALUE' => "TRUE"
        ]);
    }
}
