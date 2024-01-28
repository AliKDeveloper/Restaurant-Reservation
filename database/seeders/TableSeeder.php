<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 100; $i++)
        {
            $table = new Table();
            $table->id = $i;
            $table->client = fake()->name;
            $table->reserved_by = fake()->name;
            $table->arrival_time = fake()->dateTime;
            $table->phone = fake()->phoneNumber;
            $table->is_reserved = true;
            $table->note = null;
            $table->updated_at = fake()->dateTime;
            $table->created_at = fake()->dateTime;
            $table->save();
        }
    }
}
