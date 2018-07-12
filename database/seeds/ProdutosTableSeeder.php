<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "id" => 1,
            "nome" => "Produto teste1",
            "descricao"=> "teste de descricao de produto",
            "valor_compra"=> 10,
            "valor_revenda"=> 20,
            "ativo"=> 1,
            "imagem"=> "teste.jpg",
        ]);
    }
}
