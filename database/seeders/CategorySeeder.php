<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clean the db table
        \DB::table('categories')->truncate();
        // insert table data
        Category::insert([
            'title' => 'Έπιπλα',
            'slug' => 'epipla',
            'image' => 'trapezaria.jpeg',
            'featured' => 1,
        ]);
        Category::insert([
            'title' => 'Διακοσμητικά/Eίδη σπιτιού',
            'slug' => 'home-products',
            'image' => 'eidi-spitioy.jpeg',
            'featured' => 1,
        ]);
        Category::insert([
            'title' => 'Προϊόντα Τεχνολογίας',
            'slug' => 'technologia',
            'image' => 'technologia.jpeg',
            'featured' => 1,
        ]);
        Category::insert([
            'title' => 'Ηλεκτρικές συσκευές',
            'slug' => 'hl-siskeyes',
            'image' => 'hl-syskeyes.jpeg',
            'featured' => 1,
        ]);
        //   Category::insert([
        //     'title' => 'Τηλεφωνία & Internet',
        //     'slug' => 'tilefwnia-internet',
        //     'image'=> 'tilefwnia-internet.jpeg',
        //     'featured' => 1,
        //   ]);
        //   Category::insert([
        //     'title' => 'Ένδυση/Υπόδηση',
        //     'slug' => 'endysh-ypodish',
        //     'image' => 'endysh-ypodish.jpeg',
        //   ]);
        // Category::insert([
        //   'title' => 'Είδη δώρου',
        //   'slug' => 'eidi-dwroy',
        //   'image' => 'eidi-dwroy.jpeg',
        // ]);
        // Category::insert([
        //   'title' => 'Γυμναστήρια/σπορ',
        //   'slug' => 'gym-sports',
        //   'image' => 'gym-sports.jpeg',
        // ]);
        // Category::insert([
        //   'title' => 'Χρώματα/Ανακαίνιση',
        //   'slug' => 'xrwmata-anakainisi',
        //   'image'=> 'xrwmata-anakainisi.jpeg',
        // ]);
        //   Category::insert([
        //     'title' => 'Παροχή Yπηρεσιών',
        //     'slug' => 'paroxi-ypiresiwn',
        //     'image'=> 'paroxi-ypiresiwn.jpeg',
        //     'featured' => 1,
        //   ]);
        //   Category::insert([
        //     'title' => 'Τρόφιμα/Super Market',
        //     'slug' => 'food-super-market',
        //     'image'=> 'food-super-market.jpeg',
        //     'featured' => 1,
        //   ]);
        // Category::insert([
        //   'title' => 'Καλλυντικά/Είδη Υγιεινής',
        //   'slug' => 'kalintika-eidi-ygieinhs',
        //   'image'=> 'kalintika-eidi-ygeihnhs.jpeg',
        // ]);
        // Category::insert([
        //   'title' => 'Ταξίδια',
        //   'slug' => 'travel',
        //   'image'=> 'travel.jpeg',
        // ]);
        //   Category::insert([
        //     'title' => 'Διασκέδαση',
        //     'slug' => 'diaskedasi',
        //     'image'=> 'cinema-diaskedasi.jpeg',
        //   ]);
        //   Category::insert([
        //     'title' => 'Μετακομίσεις',
        //     'slug' => 'metakomiseis',
        //     'image'=> 'metakomiseis.jpeg',
        //     'featured' => 1,
        //   ]);
        //   Category::insert([
        //     'title' => 'Βιβλία',
        //     'slug' => 'vivlia',
        //     'image'=> 'vivlia.jpeg',
        //     'featured' => 1,
        //   ]);
    }
}
