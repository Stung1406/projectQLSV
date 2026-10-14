<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'StudentName' => 'Nguyen Van An',
                'StudentEmail' => 'an.nguyen@gmail.com',
                'StudentGender' => '0',
                'ClassRoomID' => 1,
            ],
            [
                'StudentName' => 'Tran Thi Binh',
                'StudentEmail' => 'binh.tran@gmail.com',
                'StudentGender' => '1',
                'ClassRoomID' => 2,
            ],
            [
                'StudentName' => 'Le Van Cuong',
                'StudentEmail' => 'cuong.le@gmail.com',
                'StudentGender' => '0',
                'ClassRoomID' => 3,
            ],
            [
                'StudentName' => 'Pham Thi Dung',
                'StudentEmail' => 'dung.pham@gmail.com',
                'StudentGender' => '1',
                'ClassRoomID' => 1,
            ],
            [
                'StudentName' => 'Hoang Van Duc',
                'StudentEmail' => 'duc.hoang@gmail.com',
                'StudentGender' => '0',
                'ClassRoomID' => 2,
            ],
        ]);
    }
}

