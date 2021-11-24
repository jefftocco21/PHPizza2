<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        //SEEDING WITHOUT USING FACTORIES
        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family',
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My Family Post',
        //     'slug' => 'my-first-post',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '

        //     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dignissim accumsan orci at mattis. Aliquam eget lectus vitae nisl varius auctor eu tincidunt ex. Nam luctus nisl interdum turpis blandit, finibus convallis eros rutrum. Nunc tempus posuere dui ac dictum. Ut sollicitudin mi tortor, euismod tristique diam iaculis et. Nam molestie id enim in tincidunt. Phasellus nisl quam, placerat sit amet velit ac, suscipit blandit tellus. Integer consectetur sollicitudin massa. Phasellus hendrerit mattis velit ut sodales. Quisque porta lacinia orci vitae commodo. Praesent eget tempus mauris, vel varius ante. Nunc nulla lacus, tempus vitae tempor eget, commodo in tortor.</p>'
        // ]);
        
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My Work Post',
        //     'slug' => 'my-second-post',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '

        //     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dignissim accumsan orci at mattis. Aliquam eget lectus vitae nisl varius auctor eu tincidunt ex. Nam luctus nisl interdum turpis blandit, finibus convallis eros rutrum. Nunc tempus posuere dui ac dictum. Ut sollicitudin mi tortor, euismod tristique diam iaculis et. Nam molestie id enim in tincidunt. Phasellus nisl quam, placerat sit amet velit ac, suscipit blandit tellus. Integer consectetur sollicitudin massa. Phasellus hendrerit mattis velit ut sodales. Quisque porta lacinia orci vitae commodo. Praesent eget tempus mauris, vel varius ante. Nunc nulla lacus, tempus vitae tempor eget, commodo in tortor.</p>'
        // ]);
    }
}
