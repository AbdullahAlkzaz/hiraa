<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'إظهار المستخدمين',
                'slug' => 'show-users'
            ],
            [
                'name' => 'تعديل المستخدمين',
                'slug' => 'modify-users'
            ],
            [
                'name' => 'إظهار الأحصائيات',
                'slug' => 'show-statistics'
            ],
            [
                'name' => 'تعديل الأحصائيات',
                'slug' => 'modify-statistics'
            ],
            
        ];
        foreach ($permissions as $permission){
            Permission::create($permission);
        }
    }
}
