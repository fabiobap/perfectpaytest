<?php

use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = App\Product::all();
        $customers = App\Customer::all();

       if ($products->count() === 0 || $customers->count() === 0) {
            $this->command->info('Não tem nenhum produto/cliente cadastrado!');
            return;
        }
        $status = collect(['vendidos', 'cancelados', 'devoluções']);
        $salesCount = (int)$this->command->ask('Quantas vendas?', 100);

        factory(App\Sale::class, $salesCount)->make()->each(function ($sale) use ($products, $customers, $status) {
            $sale->product_id = $products->random()->id;
            $sale->customer_id = $customers->random()->id;
            $sale->status = $status->random();
            $sale->save();
        });
    }
}
