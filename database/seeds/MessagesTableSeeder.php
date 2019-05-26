<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Message::truncate();

        Message::create([
                'from_user_id' => 1,
                'message' => 'Hi',
                'to_user_id' => 2,
            ]);
    }
}
