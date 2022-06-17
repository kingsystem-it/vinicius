<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '238820706000120',
            'name' =>'TesteTi',
            'url' => 'testeti',
            'email' => 'vinicius@teste.com.br',
        ]);
    }
}
