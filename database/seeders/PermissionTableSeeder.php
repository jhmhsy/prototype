<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'system-admin',
            'is-user',
            'overview-list',
            'checkin-list',
            'checkin-log-list',
            'checkin-edit',
            'member-create',
            'member-view',
            'member-services',
            'member-list',
            'member-edit',
            'member-delete',
            'member-membership-renew',
            'subscription-create',
            'subscription-extend',
            'subscription-end',
            'locker-create',
            'locker-extend',
            'locker-end',
            'treadmill-create',
            'treadmill-extend',
            'treadmill-end',

            'price-view',
            'price-edit',
            'reservation-list',
            'equipment-list',
            'equipment-view',
            'equipment-create',
            'equipment-edit',
            'equipment-delete',
            'event-list',
            'event-view',
            'event-create',
            'event-edit',
            'event-delete',
            'user-list',
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'feedback-list',
            'help-list',

            'faq-list',
            'faq-view',
            'faq-edit',
            'faq-create',
            'faq-delete',
            'asset-list',
            'dailysales-list',
            'productsales-list',

            'confirmation-list',
            'checkin-info',






        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}