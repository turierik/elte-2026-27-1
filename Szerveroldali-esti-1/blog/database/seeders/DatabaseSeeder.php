<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10) -> create();
        Post::factory(20) -> create() -> each(
            function($post) use ($users){
                $idsToSync = $users -> random(rand(2, 5)) -> pluck('id');
                $post -> likes() -> sync($idsToSync);
            }
        );
    }
}
