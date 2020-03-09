<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use Carbon\Carbon;

class PermissionRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $now = Carbon::now();

        $permissions = [
        	// Dashboard
            ['name' => 'Access Developer Dashboard'],
            ['name' => 'Access Dashboard'],
            // User
            ['name' => 'List User'],
            ['name' => 'Create User'],
            ['name' => 'Update User'],
            ['name' => 'Delete User'],
            ['name' => 'Update User Credentials'],
            ['name' => 'Update User Roles'],

            // Kiosk
            ['name' => 'List Kiosk'],
            ['name' => 'Create Kiosk'],
            ['name' => 'Update Kiosk'],
            ['name' => 'Delete Kiosk'],

            // Product
            ['name' => 'List Product'],
            ['name' => 'Create Product'],
            ['name' => 'Update Product'],
            ['name' => 'Delete Product'],

            // Order
            ['name' => 'List Order'],
            ['name' => 'Create Order'],
            ['name' => 'Update Order'],
            ['name' => 'Delete Order'],
        ];

        foreach ($permissions as $key => $permission) {
            $permissions[$key]['guard_name'] = 'web';
            $permissions[$key]['created_at'] = $now;
            $permissions[$key]['updated_at'] = $now;
        }

        Permission::insert($permissions);

        $roles_array = [
            'Developer', 'Owner', 'Manager', 'Cashier',
        ];

            foreach($roles_array as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if( $role->name == 'Developer' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Developer granted all the permissions');
                }

                if( $role->name == 'Owner' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Owner granted all the permissions');
                } elseif ( $role->name == 'Manager' ) {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Manager granted all the permissions');

                } elseif ( $role->name == 'Cashier' ) {
                    // for others by default only read access
                    $role->syncPermissions(['List Product', 'Create Order', 'List Order']);
                    $this->command->info('Cashier granted List Product, Create Order, List Order');
                }
            }

        $developer = User::where('id', 1)->first();
        $developer->assignRole('Developer');

        $adminusers = User::whereIn('id', [2])->get();
        foreach ($adminusers as $adminuser) {
            $adminuser->assignRole('Owner');
            $adminuser->revokePermissionTo('Access Developer Dashboard');
        }

        $manager = User::where('id', 3)->first();
        $manager->assignRole('Manager');
        $manager->revokePermissionTo('Access Developer Dashboard');

        $cashiers = User::whereIn('id', [4,5])->get();
        foreach ($cashiers as $cashier) {
            $cashier->assignRole('Cashier');
        }
    }
}