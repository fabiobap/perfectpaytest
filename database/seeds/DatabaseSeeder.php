<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('Quer dar um refresh no banco de dados?')) {
            $this->command->call('migrate:refresh');
            $this->command->info('Database was refreshed');
        }
        $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SaleSeeder::class);
    }
}
