<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id'=>2,'name' => 'Sub-Admin','guard_name'=>'web'],
        ['id'=>3,'name'=> 'Editor','guard_name'=>'web'],
        ['id'=>4,'name'=>'Contributor','guard_name'=>'web']
    ];
    foreach ($data as $item) {
        Role::updateOrInsert(['id' => $item['id']], $item);
    }
    }
}
