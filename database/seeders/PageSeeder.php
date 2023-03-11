<?php

namespace Database\Seeders;

use App\Models\Pages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            ['parent_id' => null, "slug" => "page-1", "title" => "Page 1", "content" => "Parent Page 1 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 1],
            ['parent_id' => null, "slug" => "page-5", "title" => "Page 5", "content" => "Parent Page 5 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 2],
            ['parent_id' => 1, "slug" => "page-2", "title" => "Page 1 > Page 2", "content" => "Page 2 of Parent Page 1 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 1],
            ['parent_id' => 1, "slug" => "page-3", "title" => "Page 1 > Page 3", "content" => "Page 3 of Parent Page 1 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 2],
            ['parent_id' => 3, "slug" => "page-1", "title" => "Page 1 > Page 2 > Page 1", "content" => "Page 1 > Page 2 > Page 1 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 1],
            ['parent_id' => 3, "slug" => "page-2", "title" => "Page 1 > Page 2 > Page 2", "content" => "Page 1 > Page 2 > Page 2 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 2],
            ['parent_id' => 3, "slug" => "page-3", "title" => "Page 1 > Page 2 > Page 3", "content" => "Page 1 > Page 2 > Page 3 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 3],
            ['parent_id' => 4, "slug" => "page-4", "title" => "Page 1 > Page 3 > Page 4", "content" => "Page 1 > Page 3 > Page 4 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 1],
            ['parent_id' => 4, "slug" => "page-5", "title" => "Page 1 > Page 3 > Page 5", "content" => "Page 1 > Page 3 > Page 5 Content",
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(), "priority" => 2]
        ];

        Pages::insert($pages);
    }
}
