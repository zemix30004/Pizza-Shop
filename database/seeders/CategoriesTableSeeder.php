<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Пиццы',
                'code' => 'pizzas',
                'description' => 'Описание пицц на сайте',
                'image' => 'categories/Пиццы.png',
            ],
            [
                'name' => 'Закуски',
                'code' => 'snacks',
                'description' => 'Описание закусок на сайте',
                'image' => 'categories/Закуски.jpg',
            ],
            [
                'name' => 'Напитки',
                'code' => 'beverages',
                'description' => 'Описание напитков на сайте',
                'image' => 'categories/Напитки.jpg',
            ],
            [
                "name" => "Десерты",
                "code" => "desserts",
                "description" => "Описание десертов на сайте",
                "image" => "categories/Десерты.jpg",
            ],
        ]);
    }
}
