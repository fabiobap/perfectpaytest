<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customersCount = max((int)$this->command->ask('Quantos clientes?', 10),1);
        $identificationType = collect(['CPF', 'CNPJ', 'RG']);
        factory(Customer::class, $customersCount)->make()->each(function ($customer) use ($identificationType){
            $customer->identification_type = $identificationType->random();
            $customer->save();
        });
    }
}
