<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'master']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'kepalakcd']);
        Role::create(['name' => 'kasubag']);
        Role::create(['name' => 'pengawas']);
        Role::create(['name' => 'stafkesiswaan']);
        Role::create(['name' => 'stafkurikulum']);
        Role::create(['name' => 'stafhumas']);
        Role::create(['name' => 'stafsapras']);
        Role::create(['name' => 'stafketatausahaan']);
        Role::create(['name' => 'stafdapodik']);
        Role::create(['name' => 'stafbos']);
        Role::create(['name' => 'stafbopd']);
        Role::create(['name' => 'stafgaji']);
        Role::create(['name' => 'stafkepeg']);
        Role::create(['name' => 'stafabsen']);
        Role::create(['name' => 'stafpendataan']);
        Role::create(['name' => 'stafpersuratan']);
        Role::create(['name' => 'stafaplikasi']);
        Role::create(['name' => 'kepalasekolah']);
        Role::create(['name' => 'wakasis']);
        Role::create(['name' => 'wakakur']);
        Role::create(['name' => 'wakahumas']);
        Role::create(['name' => 'wakasapras']);
        Role::create(['name' => 'kepalatu']);
        Role::create(['name' => 'opskesiswaan']);
        Role::create(['name' => 'opskurikulum']);
        Role::create(['name' => 'opshumas']);
        Role::create(['name' => 'opssapras']);
        Role::create(['name' => 'opsketatausahaan']);
        Role::create(['name' => 'opsdapodik']);
        Role::create(['name' => 'opsbos']);
        Role::create(['name' => 'opsbopd']);
        Role::create(['name' => 'opsgaji']);
        Role::create(['name' => 'opskepeg']);
        Role::create(['name' => 'opsabsen']);
        Role::create(['name' => 'opspendataan']);
        Role::create(['name' => 'opspersuratan']);
        Role::create(['name' => 'opsaplikasi']);
    }
}
