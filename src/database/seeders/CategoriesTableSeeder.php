<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // お問い合わせの種類：カテゴリー5件
        $seeds = [
            [ 'content' => '商品のお届けについて' ],
            [ 'content' => '商品の交換について' ],
            [ 'content' => '商品トラブル' ],
            [ 'content' => 'ショップへのお問い合わせ' ],
            [ 'content' => 'その他' ],
        ];

        foreach ( $seeds as $param) {
            DB::table('categories')->insert($param);
        }
    }
}
