<?php

use Illuminate\Database\Seeder;
use App\Models\HR;
use Illuminate\Support\Facades\Hash;

class HRSeeder extends Seeder
{
    public function run()
    {
        HR::create([
            'nama' => 'Ani Sari',
            'jabatan' => 'Payroll Manager',
            'email' => 'anisari@travel.com',
            'password' => Hash::make('Anisari123')
        ]);
    }
}
