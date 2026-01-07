<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t1 = Tenant::create(['id' => 'tenant1', 'name' => 'Tenant One']);
        $t1->domains()->create(['domain' => 'tenant1.localhost']);

        $t2 = Tenant::create(['id' => 'tenant2', 'name' => 'Tenant Two']);
        $t2->domains()->create(['domain' => 'tenant2.localhost']);

        $t3 = Tenant::create(['id' => 'tenant3', 'name' => 'Tenant Three']);
        $t3->domains()->create(['domain' => 'tenant3.localhost']);
    }
}
