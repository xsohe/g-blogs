<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Projects;
use App\Models\Stack;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        Blog::factory(20)->create();
        Projects::factory(4)->create();
        Stack::factory(5)->create();

        User::factory()->create([
            'name' => 'Yanuar Eka',
            'email' => 'yanuar@gmail.com',
            'username' => 'yanuareka',
            'password' => 'password',
            'is_admin' => 1
        ]);

        Tag::create([
            'name' => 'Programming',
            'slug' => 'programming', 
        ]);
        Tag::create([
            'name' => 'Web Design',
            'slug' => 'web-design', 
        ]);
        Tag::create([
            'name' => 'Personal',
            'slug' => 'personal', 
        ]);
        Tag::create([
            'name' => 'Traveling',
            'slug' => 'traveling', 
        ]);

        // Blog::create([
        //     'title' => 'How To Learn Programming',
        //     'users_id' => 1,
        //     'tags_id' => 1,
        //     'slug' => 'how-to-learn',
        //     'excerpt' => 'Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.',
        //     'body' => '<p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p> <p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p>',
        // ]);
        // Blog::create([
        //     'title' => 'How To make tailwindcss',
        //     'users_id' => 2,
        //     'tags_id' => 2,
        //     'slug' => 'make-tailwind-css',
        //     'excerpt' => 'Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.',
        //     'body' => '<p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p> <p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p>',
        // ]);
        // Blog::create([
        //     'title' => 'How To make tailwindcss',
        //     'users_id' => 2,
        //     'tags_id' => 3,
        //     'slug' => 'makeit-tailwind',
        //     'excerpt' => 'Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.',
        //     'body' => '<p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p> <p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p>',
        // ]);
        // Blog::create([
        //     'title' => 'How To make tailwindcss',
        //     'users_id' => 1,
        //     'tags_id' => 2,
        //     'slug' => 'make-css',
        //     'excerpt' => 'Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.',
        //     'body' => '<p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p> <p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p>',
        // ]);
        // Blog::create([
        //     'title' => 'How To Learn Programming',
        //     'users_id' => 1,
        //     'tags_id' => 1,
        //     'slug' => 'how',
        //     'excerpt' => 'Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.',
        //     'body' => '<p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p> <p>Welcome to the release of Tailwind Nextjs Starter Blog template v2.0. This release is a major refactor of the codebase to support Nextjs App directory and React Server Components.</p>',
        // ]);
    }
}
