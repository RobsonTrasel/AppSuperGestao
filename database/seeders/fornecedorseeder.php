<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class fornecedorseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = "Fornecedor 100";
        $fornecedor->site = "fornecedor100.br";
        $fornecedor->UF = "CE";
        $fornecedor->email = "contato@fornecedor100.com.br";
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.br',
            'UF' => 'RS',
            'email' => 'contato@fornecedor200.com.br',
        ]);


        DB::table('fornecedor_models')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.br',
            'UF' => 'PR',
            'email' => 'contato@fornecedor300.com.br',
        ]);
    }
}
