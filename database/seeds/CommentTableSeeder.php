<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Comment;

class CommentTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Comment::truncate();
        foreach (range(1, 30) as $i) {
            Comment::create([
                'ticket_id' => rand(1, 20),
                'user_id' => rand(1, 3),
                'body' => "Etiam sit amet orci egetAenean ut eros et nislNulla consequat massa quis enimIn consectetuer turpis ut velit.",
            ]);
        }
    }

}
