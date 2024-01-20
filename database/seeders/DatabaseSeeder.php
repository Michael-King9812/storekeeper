<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Seed User Privileges
        collect([
            'canAddUser',
            'canDeleteUser',
            'canAssignPrivilege',
            'canViewFullSalesReport',
            'canViewLimitedSalesReport',
            'canAddItem',
            'canRemoveItem',
            'canAddStockPurchase',
            'canIssueRequisition',
            'canRecordReturns',
            'canMakeRequisition',
            'canAddClosingStock',    
        ])->each(function($privilege){
            
            DB::table('user_privileges')->insert([
                ['name' => $privilege]
            ]);
        });
        

        // Seed Roles
        DB::table('roles')->insert([
            ['name' => 'Super Admin', 'privileges' => json_encode(range(1,12))],
            ['name' => 'Manager', 'privileges' => json_encode([1,2,3,5,6,7,8,9,10])],
            ['name' => 'Stock', 'privileges' => json_encode(range(6,9))],
            ['name' => 'Bar Attendant', 'privileges' => json_encode([11,12])]
        ]);
        

        // create mock user
        $userId = DB::table('users')->insertGetId([
            'name' => 'Raph',
            'role_id' => 1,
            'username' => 'super_admin',
            'password' => Hash::make('112123'),
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        ]);

        // Add user privileges 
        DB::table('user_privileges')->insert([
            'user_id' => $userId,
            'privileges' => json_encode(range(1,12)),
            'created_at' => \Carbon\Carbon::now()
        ]);

        // Seed Items Types
        collect([
            'Drink',
            'Cigerate'
        ])->each(function($privilege){
            
            DB::table('user_privileges')->insert([
                ['name' => $privilege]
            ]);
        });


        // $this->call([
        //     AdminSeeder::class,
        // ]);

    }
}
