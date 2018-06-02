<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Ticket;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Ticket::truncate();
        foreach(range(1, 10) as $i) {
            Ticket::create([
                'user_id' => rand(1, 20),
                'uuid' => Str::uuid(),
                'ref' => date('dmYHis') . "/" . rand(1, 100),
                'title' => "Titulo do Ticket",
                'fullname' => "Adriel User",
                'email' => "awelterramos". rand(1, 20)."@gmail.com",
                'category' => "Financeiro",
                'level' => "Alta",
                'status' => "1",
                'description' => "Etiam sit amet orci egetAenean ut eros et nislNulla consequat massa quis enimIn consectetuer turpis ut velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed fringilla mauris sit amet nibh.",
            ]);
        }
    }
}