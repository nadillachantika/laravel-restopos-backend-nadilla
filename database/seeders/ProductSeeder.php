<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            // [
            //     'name' => 'Jus Jeruk',
            //     'category_id' => 5,
            //     'description' => 'Minuman segar dari jeruk.',
            //     'image' => 'jus_jeruk.jpg',
            //     'price' => 10000,
            //     'stock' => 50,
            // ],
            // [
            //     'name' => 'Ayam Crispy',
            //     'category_id' => 1,
            //     'description' => 'Ayam goreng renyah dengan bumbu khas.',
            //     'image' => 'ayam_crispy.jpg',
            //     'price' => 25000,
            //     'stock' => 30,
            // ],
            // [
            //     'name' => 'Pecel Ayam',
            //     'category_id' => 1,
            //     'description' => 'Nasi pecel dengan ayam.',
            //     'image' => 'pecel_ayam.jpg',
            //     'price' => 20000,
            //     'stock' => 40,
            // ],
            // [
            //     'name' => 'Nasi Goreng Seafood',
            //     'category_id' => 1,
            //     'description' => 'Nasi goreng dengan campuran seafood.',
            //     'image' => 'nasigoreng_seafood.jpg',
            //     'price' => 30000,
            //     'stock' => 25,
            // ],
            // [
            //     'name' => 'Ayam Geprek',
            //     'category_id' => 1,
            //     'description' => 'Ayam geprek dengan sambal pedas.',
            //     'image' => 'ayam_geprek.jpg',
            //     'price' => 22000,
            //     'stock' => 35,
            // ],
            // [
            //     'name' => 'Soto Betawi',
            //     'category_id' => 1,
            //     'description' => 'Soto khas Betawi dengan kuah santan.',
            //     'image' => 'soto_betawi.jpg',
            //     'price' => 18000,
            //     'stock' => 45,
            // ],
            // [
            //     'name' => 'Soto',
            //     'category_id' => 1,
            //     'description' => 'Soto dengan kuah bening.',
            //     'image' => 'soto.jpg',
            //     'price' => 15000,
            //     'stock' => 60,
            // ],
            // [
            //     'name' => 'Sphagetti',
            //     'category_id' => 1,
            //     'description' => 'Sphagetti dengan saus tomat.',
            //     'image' => 'sphagetti.jpg',
            //     'price' => 28000,
            //     'stock' => 20,
            // ],

            [
                'name' => 'Jus Mangga',
                'category_id' => 5,
                'description' => 'Minuman segar dari mangga.',
                'image' => 'jus_mangga.jpg',
                'price' => 12000,
                'stock' => 40,
            ],
            [
                'name' => 'Es Teh',
                'category_id' => 5,
                'description' => 'Minuman teh manis dingin.',
                'image' => 'es_teh.jpg',
                'price' => 8000,
                'stock' => 60,
            ],
            [
                'name' => 'Es Jeruk',
                'category_id' => 5,
                'description' => 'Minuman jeruk manis dingin.',
                'image' => 'es_jeruk.jpg',
                'price' => 9000,
                'stock' => 55,
            ],
            [
                'name' => 'Es Kelapa',
                'category_id' => 5,
                'description' => 'Minuman segar dari kelapa.',
                'image' => 'es_kelapa.jpg',
                'price' => 15000,
                'stock' => 30,
            ],
            [
                'name' => 'Air Mineral',
                'category_id' => 5,
                'description' => 'Air mineral kemasan.',
                'image' => 'air_mineral.jpg',
                'price' => 5000,
                'stock' => 100,
            ],

            [
                'name' => 'Teh Tarik',
                'category_id' => 5,
                'description' => 'Minuman teh susu khas Malaysia.',
                'image' => 'teh_tarik.jpg',
                'price' => 10000,
                'stock' => 45,
            ],
            [
                'name' => 'Kopi Tubruk',
                'category_id' => 5,
                'description' => 'Minuman kopi kental dengan gula.',
                'image' => 'kopi_tubruk.jpg',
                'price' => 12000,
                'stock' => 25,
            ],
            [
                'name' => 'Kopi Latte',
                'category_id' => 5,
                'description' => 'Minuman kopi dengan susu.',
                'image' => 'kopi_latte.jpg',
                'price' => 15000,
                'stock' => 30,
            ],
            [
                'name' => 'Soda Lemon',
                'category_id' => 5,
                'description' => 'Minuman soda rasa lemon.',
                'image' => 'soda_lemon.jpg',
                'price' => 9000,
                'stock' => 40,
            ],
            [
                'name' => 'Kopi Hitam',
                'category_id' => 5,
                'description' => 'Minuman kopi tanpa gula.',
                'image' => 'kopi_hitam.jpg',
                'price' => 10000,
                'stock' => 35,
            ],

            [
                'name' => 'Lemon Tea',
                'category_id' => 5,
                'description' => 'Minuman teh dengan perasan lemon.',
                'image' => 'lemon_tea.jpg',
                'price' => 8000,
                'stock' => 50,
            ],
        ];

        foreach ($products as $productData) {
            $product = new Product();
            $product->name = $productData['name'];
            $product->category_id = $productData['category_id'];
            $product->description = $productData['description'];
            $product->price = $productData['price'];
            $product->stock = $productData['stock'];

            // Simpan gambar produk dari storage/products
            $imagePath = 'products/' . $productData['image'];
            $product->image = $imagePath;

            // Jika file gambar ada, simpan ke dalam storage
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->copy($imagePath, 'products/' . $productData['image']);
            }

            $product->save();
        }
    }
}
