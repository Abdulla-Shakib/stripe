<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_time = now()->format('Y-m-d H:i:s');
        $groups = [
            [
                "product_name" => 'Flower',
                "photo" => '1.jpg',
                "price" => '700',
                "product_description" => 'Flower Description',
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "product_name" => 'Gadget',
                "photo" => '2.jpg',
                "price" => '1200',
                "product_description" => 'Gadget Description',
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ],
            [
                "product_name" => 'Bridge',
                "photo" => '3.jpg',
                "price" => '5000',
                "product_description" => 'Bridge Description',
                "created_at" => $current_time,
                "updated_at" => $current_time,
            ]

        ];
        Product::insert($groups);
    }
}
