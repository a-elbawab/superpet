<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class ]->forgetCachedPermissions();

        $permissions = ['create', 'update', 'list', 'show', 'delete'];
        $tables = app_get_table_names();
        $data = [];

        foreach ($tables as $table) {
            if (!empty($title = $table['title'])) {
                foreach ($permissions as $permission) {
                    $data[] = [
                        'name' => "{$title} {$permission}",
                        'type' => $title,
                        'guard_name' => 'web',
                    ];
                }
            }
        }

        foreach ($data as $datum) {
            Permission::firstOrCreate($datum);
        }
    }
}
