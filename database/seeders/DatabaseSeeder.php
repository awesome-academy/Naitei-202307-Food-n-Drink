<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        Product::factory(10)->create();
        Contact::factory(10)->create();

        $this->call([
            CategoryProductSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
        ]);

        CartItem::factory(10)->create();
        ProductReview::factory(5)->create();
    }
}
