<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            ['email' => 'c14240005@john.petra.ac.id', 'name' => 'Daoshen'],
            ['email' => 'c14240011@john.petra.ac.id', 'name' => 'Wayne'],
            ['email' => 'c14240036@john.petra.ac.id', 'name' => 'Hauw'],
            ['email' => 'c14240041@john.petra.ac.id', 'name' => 'Nelson'],
            ['email' => 'c14240078@john.petra.ac.id', 'name' => 'Charles'],
        ];

        foreach ($admins as $adminData) {
            Admin::updateOrCreate(
                ['email' => $adminData['email']],
                [
                    'name' => $adminData['name'],
                    'is_admin' => true,
                ]
            );
        }
    }
}
