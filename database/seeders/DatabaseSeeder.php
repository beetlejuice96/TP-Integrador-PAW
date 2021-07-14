<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\DocumentType;
use App\Models\ModelV;
use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConfigurationSeeder::class);

        $dni = DocumentType::create([
            "DOCUMENT_TYPE" => "DNI"
        ]);

        $dilan = Person::create([
            "NAME" => "Dilan",
            "SURNAME" => "Bernabe",
            "DOCUMENT_NUMBER" => 12345678,
            "ID_DOCUMENT_TYPE" => $dni->ID_DOCUMENT_TYPE,
        ]);

        $agustin = Person::create([
            "NAME" => "Agustin",
            "SURNAME" => "Normand",
            "DOCUMENT_NUMBER" => 41677293,
            "ID_DOCUMENT_TYPE" => $dni->ID_DOCUMENT_TYPE,
        ]);


        $renault = Brand::create(["NAME" => "Renault"]);

        $volkswagen = Brand::create(["NAME" => "Volkswagen"]);

        $clio = ModelV::create(["NAME" => "CLIO", "ID_BRAND" => $renault->ID_BRAND]);

        $gol = ModelV::create(["NAME" => "GOL", "ID_BRAND" => $volkswagen->ID_BRAND]);

        $vento = ModelV::create(["NAME" => "VENTO", "ID_BRAND" => $volkswagen->ID_BRAND]);

        $agustin->vehicles()->save($clio);


    }
}
