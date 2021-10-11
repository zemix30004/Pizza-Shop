<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => 'Eugene',
            'phone' => '0662342322',
            'email' => 'eugene@gmail.com',
            'message' => 'Первые контактные данные!'
        ]);
    }
}
