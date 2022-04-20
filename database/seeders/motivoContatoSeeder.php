<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\motivoContato;

class motivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        motivoContato::create(['motivo_contato' => 'Duvida']);
        motivoContato::create(['motivo_contato' => 'Elogio']);
        motivoContato::create(['motivo_contato' => 'Reclamação']);
    }
}
