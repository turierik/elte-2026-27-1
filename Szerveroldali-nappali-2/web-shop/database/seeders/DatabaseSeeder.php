<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        $products = Product::factory(10) -> create();
        $users = User::factory(10) -> create() -> each(
            function($user) use ($products){
                $orderCount = rand(2, 5);
                Order::factory($orderCount) -> create(
                    ['user_id' => $user -> id]
                ) -> each(
                    function($order) use ($products){
                        $idsToSync = $products -> random(rand(1, 5)) -> pluck('id');
                        $order -> products() -> sync($idsToSync);
                    }
                );
            }
        );
        DB::commit();
    }
}
