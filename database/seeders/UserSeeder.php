<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            'master',
            'admin',
            'kepalakcd',
            'kasubag',
            'pengawas',
            'stafkesiswaan',
            'stafkurikulum',
            'stafhumas',
            'stafsapras',
            'stafketatausahaan',
            'stafdapodik',
            'stafbos',
            'stafbopd',
            'stafgaji',
            'stafkepeg',
            'stafabsen',
            'stafpendataan',
            'stafpersuratan',
            'stafaplikasi',
            'kepalasekolah',
            'wakasis',
            'wakakur',
            'wakahumas',
            'wakasapras',
            'kepalatu',
            'opskesiswaan',
            'opskurikulum',
            'opshumas',
            'opssapras',
            'opsketatausahaan',
            'opsdapodik',
            'opsbos',
            'opsbopd',
            'opsgaji',
            'opskepeg',
            'opsabsen',
            'opspendataan',
            'opspersuratan',
            'opsaplikasi',
        ];
        $default = [
            'password' => bcrypt('maindrakcd9'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ];

        foreach ($users as $value) {
            User::create([...$default, ...[
                'name' => Str::title($value),
                'username' => $value,
                'email' => $value . '@maindra.com',
            ]])->assignRole($value);
        }
    }
}
