<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->delete();

        $count = 25;
        Note::factory()->create();
        for ($i = 1; $i < $count; $i++) {
            Note::factory()->withParent(mt_rand(0, ($i - 1)))->create();
        }


        // if (Note::all()->count() === 0) {

        // }




        // Note::factory($count)->create()->each(function($item, $i)  {
        //     if (mt_rand(0,1)) {
        //         $item->whithParent(mt_rand(0, $i));
        //     }
        // });


        // dd();
        
        // $i = 0;
        // echo '$i = {$i} '  . $i . '/n/n';
        // foreach(Note::all() as $item) {
        //     var_dump($item);
        //     if (mt_rand(0,1)) {
        //         $item->whithParent(mt_rand(0, $i));
        //     }
        //     $i++;
        // }
    }
}
