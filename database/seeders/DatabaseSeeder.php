<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Role;
use App\Models\ScheduleTime;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['admin', 'all', 'all', 1],
            ['student', 'wrote', 'none', 0],
            ['teacher', 'wrote', 'empty', 0],
        ];
        foreach($roles as $i){
            Role::create(['role' => $i[0], 'manage_blogs' => $i[1], 'manage_schedules' => $i[2], 'manage_user_data' => $i[3]]);
        }

        $majors = [
            ['BIT', 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ'],
            ['BNT', 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ'],
            ['BMT', 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ'],
        ];
        foreach ($majors as $i) {
            Major::create(['name' => $i[0], 'faculty' => $i[1]]);
        }
        $scheduleTime = [
            '07:40:00' => '09:10:00',
            '09:20:00' => '10:50:00',
            '11:00:00' => '12:30:00',
            '13:00:00' => '14:30:00',
            '14:35:00' => '16:05:00',
            '16:10:00' => '17:40:00',
        ];
        foreach($scheduleTime as $from => $to){
            ScheduleTime::create(['from' => $from, 'to' => $to ]);
        }
        User::create([
            'name' => 'admin',
            'surname' => '',
            'gender' => 'ຊາຍ',
            'date_of_birth' => date('Y-m-d'),
            'address' => '',
            'role' => 'admin',
            'major_id' => Major::first()->id,
            'tel' => 99999999,
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
