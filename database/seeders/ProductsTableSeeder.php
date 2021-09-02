<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'King пицца',
                'code' => 'king_pizza',
                'description' => 'Вкуснейшая пица сезона',
                'image' => 'products/Королевская пицца.jpg',
                'price' => '150.00',
                'size' => '35.00',
                'is_spicy' => true,
                'is_veg' => true,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 1,
                'name' => 'Мексиканская пицца',
                'code' => 'mexican_pizza',
                'description' => 'Самая пикантная пицца сезона',
                'image' => 'products/Мексиканская пицца.jpg',
                'price' => '134.00',
                'size' => '35.00',
                'is_spicy' => true,
                'is_veg' => false,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 1,
                'name' => 'Двойная Пепперони пицца',
                'code' => 'double_pepperony_pizza',
                'description' => 'Очень острая пицца в нашем ассортименте',
                'image' => 'products/Двойная Пепперони.jpg',
                'price' => '117.00',
                'size' => '30.00',
                'is_spicy' => true,
                'is_veg' => true,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 2,
                'name' => 'Круассан большой',
                'code' => 'cruassan_big',
                'description' => 'Ну очень большой круассан',
                'image' => 'products/Круассан большой.jpg',
                'price' => '80.00',
                'size' => '35.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 2,
                'name' => 'Биг Wings',
                'code' => 'big_wings',
                'description' => 'Нежные хрустящие крылышки',
                'image' => 'products/Хрустящие крылышки.jpg',
                'price' => '115.00',
                'size' => '450.00',
                'is_spicy' => true,
                'is_veg' => false,
                'is_best_offer' => false,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 2,
                'name' => 'Картофельные оладьи',
                'code' => 'potato_pancakes',
                'description' => 'Вкусные оладьи со вкусом картофеля',
                'image' => 'products/Картофельные оладьи.jpg',
                'price' => '48.00',
                'size' => '230.00',
                'is_spicy' => false,
                'is_veg' => true,
                'is_best_offer' => false,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 2,
                'name' => 'Жареный картофель',
                'code' => 'baby_potato',
                'description' => 'Самый обоажаемый жареный картофель',
                'image' => 'products/Жареный картофель.jpg',
                'price' => '40.00',
                'size' => '160.00',
                'is_spicy' => true,
                'is_veg' => true,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 3,
                'name' => 'Сок Rich Lemon',
                'code' => 'juice_rich_lemon',
                'description' => 'Освежающий лимонный сок от Rich',
                'image' => 'products/Сок Rich Lemon.jpg',
                'price' => '35.00',
                'size' => '1.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 3,
                'name' => 'Coca-Cola',
                'code' => 'coca_cola',
                'description' => 'Бодрящий приятный на вкус напиток',
                'image' => 'products/Coca-Cola.jpg',
                'price' => '60.00',
                'size' => '2.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 3,
                'name' => 'Узвар грушево-яблочный',
                'code' => 'uzvar_pear_apple',
                'description' => 'Сваренный из настоящих фруктов',
                'image' => 'products/Узвар грушево-яблочный.jpg',
                'price' => '40.00',
                'size' => '1.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => false,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 3,
                'name' => 'Bonaqua',
                'code' => 'bon_aqua',
                'description' => 'Освежающая минеральная вода',
                'image' => 'products/bonaqua.jpg',
                'price' => '32.00',
                'size' => '1.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => false,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 1,
                'name' => 'Пицца с морепродуктами',
                'code' => 'pizza_with_seafood',
                'description' => 'Пикантная пицца с морским вкусом',
                'image' => 'products/Пицца с морепродуктами.jpg',
                'price' => '120.00',
                'size' => '1.00',
                'is_spicy' => true,
                'is_veg' => false,
                'is_best_offer' => false,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 4,
                'name' => 'Ягодный пудинг',
                'code' => 'berry_pudding',
                'description' => 'Со вкусом настоящих лесных ягод',
                'image' => 'products/Ягодный пудинг.jpg',
                'price' => '50.00',
                'size' => '25.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => false,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 4,
                'name' => 'Шоколадные трюфели',
                'code' => 'chocolate truffles',
                'description' => 'Шедевр шоколадного искусства',
                'image' => 'products/Шоколадные трюфели.jpg',
                'price' => '60.00',
                'size' => '100.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 4,
                'name' => 'Торт Пина Колада',
                'code' => 'pie_Pina_Colada',
                'description' => 'Незабываемый карибский вкус настоящего десерта',
                'image' => 'products/Торт Пина Колада.jpg',
                'price' => '130.00',
                'size' => '30.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
            [
                'category_id' => 4,
                'name' => 'Мороженое Снежок',
                'code' => 'ice_cream_snowball',
                'description' => 'Тает во рту, а не в руках',
                'image' => 'products/Мороженое Снежок',
                'price' => '30.00',
                'size' => '5.00',
                'is_spicy' => false,
                'is_veg' => false,
                'is_best_offer' => true,
                'count' => rand(0, 10),
            ],
        ]);
    }
}
