<?php

namespace Database\Seeders;

use App\Models\AdminForm;
use Illuminate\Database\Seeder;

class AdminFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminForm::create([
            'title' => 'Test Title',
            'description' => 'Voluptatem voluptatem error sed hic non et qui aliquip illo',
            'snippet' => 'sumnenuh'
        ]);
    }
}
