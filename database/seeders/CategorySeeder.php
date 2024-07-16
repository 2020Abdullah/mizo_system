<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryList = ['اللحوم والمشويات', 'المحاشي', 'السندوتشات', 'السلطات', 'صنية ميزو', ' صنية الأسطورة', 'الوجبات', 'الأطباق الجانبية', 'صنية العتوله', 'صنية الملوك'];

        foreach($categoryList as $cate){
            Category::create([
                'name' => $cate
            ]);
        }
    }
}
