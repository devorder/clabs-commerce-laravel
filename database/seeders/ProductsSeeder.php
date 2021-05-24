<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
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
                'product_name' => 'Vivo z1 pro',
                'price' => '13999',
                'description' => 'A smartphone with 4 gigs of ram and 64 gigs of internal storage',
                'category' => 'smartphone',
                'gallary' => 'https://fdn2.gsmarena.com/vv/pics/vivo/vivo-z1-pro-1.jpg',
            ],
            [
                'product_name' => 'Lg Tv',
                'price' => '12999',
                'description' => 'A tv with some thing in it',
                'category' => 'tv',
                'gallary' => 'https://www.lg.com/in/images/tvs/md06117716/gallery/01-1100-V01.jpg',
            ],
            [
                'product_name' => 'Oppo A3s',
                'price' => '10999',
                'description' => '2 gb ram with 32 gigs of ram',
                'category' => 'smartphone',
                'gallary' => 'https://www.91-img.com/pictures/128518-v4-oppo-a3s-mobile-phone-large-1.jpg',
            ],
            [
                'product_name' => 'Nikon d3500',
                'price' => '35999',
                'description' => 'A best camera for everyone',
                'category' => 'camera',
                'gallary' => 'https://images-na.ssl-images-amazon.com/images/I/71TSinb4usL._AC_SL1500_.jpg',
            ],
            [
                'product_name' => 'canon 1500d',
                'price' => '31000',
                'description' => 'Dslr camera for photographers',
                'category' => 'camera',
                'gallary' => 'https://images-na.ssl-images-amazon.com/images/I/914hFeTU2-L._SL1500_.jpg',
            ]
        ]);        
    }
}
