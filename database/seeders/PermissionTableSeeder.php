<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'ad-list',
            'ad-create',
            'ad-active',
            'ad-edit',
            'ad-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
             'bunner-list',
            'bunner-create',
            'bunner-edit',
            'bunner-delete',
             'chat-list',
            'chat-create',
            'chat-edit',
            'chat-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
             'country-list',
            'country-create',
            'country-edit',
            'country-delete',
             'option-list',
            'option-create',
            'option-edit',
            'option-delete',
             'storecategory-list',
            'storecategory-create',
            'storecategory-edit',
            'storecategory-delete',
             'storeflyer-list',
            'storeflyer-create',
            'storeflyer-edit',
            'storeflyer-delete',
             'storeproduct-list',
            'storeproduct-create',
            'storeproduct-edit',
            'storeproduct-delete',
             'storetype-list',
            'storetype-create',
            'storetype-edit',
            'storetype-delete',
             'subcategory-list',
            'subcategory-create',
            'subcategory-edit',
            'subcategory-delete',
             'subcategoryoption-list',
            'subcategoryoption-create',
            'subcategoryoption-edit',
            'subcategoryoption-delete',
             'town-list',
            'town-create',
            'town-edit',
            'town-delete',
              'page-list',
            'page-create',
            'page-edit',
            'page-delete',
             'setting-list',
            'setting-create',
            'setting-edit',
            'setting-delete',
             'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',
             'user-list',
            'user-create',
            'user-edit',
            'user-delete',
             'notification-list',
            'notification-create',
            'notification-edit',
            'notification-delete',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}



