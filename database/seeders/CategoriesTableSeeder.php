<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\Models\Store::all() as $store) {

            $tenantAndStoreIds = ['store_id' => $store->id, 'tenant_id' => $store->tenant_id];

            \App\Models\Category::factory(15, $tenantAndStoreIds)
                ->create();
        }
    }
}
