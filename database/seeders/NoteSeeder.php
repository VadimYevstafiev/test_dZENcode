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

        $count = 100;
        Note::factory()->create();
        for ($i = 1; $i < $count; $i++) {
            Note::factory()->withParent(mt_rand(1, $i))->create();
        }
    }
}
