<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'administrator',
                'created_at' => now()
            ],
            [
                'name' => 'staff',
                'created_at' => now()
            ],
            [
                'name' => 'customer',
                'created_at' => now()
            ],
        ]);
    }
}
