<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            [
                "name" => "Dashboard",
                "group_name" => "Dashboard",
            ],

            [
                "name" => "Users List",
                "group_name" => "Users",
            ],
            [
                "name" => "Users Create",
                "group_name" => "Users",
            ],
            [
                "name" => "Users Edit",
                "group_name" => "Users",
            ],
            [
                "name" => "Users Delete",
                "group_name" => "Users",
            ],
            [
                "name" => "Users View",
                "group_name" => "Users",
            ],
            [
                "name" => "Users Tree View",
                "group_name" => "Users",
            ],

            [
                "name" => "Roles List",
                "group_name" => "Roles",
            ],
            [
                "name" => "Roles Create",
                "group_name" => "Roles",
            ],
            [
                "name" => "Roles Edit",
                "group_name" => "Roles",
            ],
            [
                "name" => "Roles Delete",
                "group_name" => "Roles",
            ],
            [
                "name" => "Roles View",
                "group_name" => "Roles",
            ],

            //Permissions
            [
                "name" => "Permissions List",
                "group_name" => "Permissions",
            ],
            [
                "name" => "Permissions Create",
                "group_name" => "Permissions",
            ],
            [
                "name" => "Permissions Edit",
                "group_name" => "Permissions",
            ],
            [
                "name" => "Permissions Delete",
                "group_name" => "Permissions",
            ],
            [
                "name" => "Permissions View",
                "group_name" => "Permissions",
            ],
            //Listings
            [
                "name" => "Listings List",
                "group_name" => "Listings",
            ],
            [
                "name" => "Listings Create",
                "group_name" => "Listings",
            ],
            [
                "name" => "Listings Edit",
                "group_name" => "Listings",
            ],
            [
                "name" => "Listings Delete",
                "group_name" => "Listings",
            ],
            [
                "name" => "Listings View",
                "group_name" => "Listings",
            ],

            //Leads
            [
                "name" => "Leads List",
                "group_name" => "Leads",
            ],
            [
                "name" => "Leads Create",
                "group_name" => "Leads",
            ],
            [
                "name" => "Leads Edit",
                "group_name" => "Leads",
            ],
            [
                "name" => "Leads Delete",
                "group_name" => "Leads",
            ],
            [
                "name" => "Leads View",
                "group_name" => "Leads",
            ],
            //Parameters
            [
                "name" => "Parameters List",
                "group_name" => "Parameters",
            ],
            [
                "name" => "Parameters Create",
                "group_name" => "Parameters",
            ],
            [
                "name" => "Parameters Edit",
                "group_name" => "Parameters",
            ],
            [
                "name" => "Parameters Delete",
                "group_name" => "Parameters",
            ],
            [
                "name" => "Parameters View",
                "group_name" => "Parameters",
            ],
            //Categories
            [
                "name" => "Categories List",
                "group_name" => "Categories",
            ],
            [
                "name" => "Categories Create",
                "group_name" => "Categories",
            ],
            [
                "name" => "Categories Edit",
                "group_name" => "Categories",
            ],
            [
                "name" => "Categories Delete",
                "group_name" => "Categories",
            ],
            [
                "name" => "Categories View",
                "group_name" => "Categories",
            ],
            // Types
            [
                "name" => "Types List",
                "group_name" => "Types",
            ],
            [
                "name" => "Types Create",
                "group_name" => "Types",
            ],
            [
                "name" => "Types Edit",
                "group_name" => "Types",
            ],
            [
                "name" => "Types Delete",
                "group_name" => "Types",
            ],
            [
                "name" => "Types View",
                "group_name" => "Types",
            ],

            // Amenites
            [
                "name" => "Amenites List",
                "group_name" => "Amenites",
            ],
            [
                "name" => "Amenites Create",
                "group_name" => "Amenites",
            ],
            [
                "name" => "Amenites Edit",
                "group_name" => "Amenites",
            ],
            [
                "name" => "Amenites Delete",
                "group_name" => "Amenites",
            ],
            [
                "name" => "Amenites View",
                "group_name" => "Amenites",
            ],

            // Sources
            [
                "name" => "Sources List",
                "group_name" => "Sources",
            ],
            [
                "name" => "Sources Create",
                "group_name" => "Sources",
            ],
            [
                "name" => "Sources Edit",
                "group_name" => "Sources",
            ],
            [
                "name" => "Sources Delete",
                "group_name" => "Sources",
            ],
            [
                "name" => "Sources View",
                "group_name" => "Sources",
            ],

            // Mediums
            [
                "name" => "Mediums List",
                "group_name" => "Mediums",
            ],
            [
                "name" => "Mediums Create",
                "group_name" => "Mediums",
            ],
            [
                "name" => "Mediums Edit",
                "group_name" => "Mediums",
            ],
            [
                "name" => "Mediums Delete",
                "group_name" => "Mediums",
            ],
            [
                "name" => "Mediums View",
                "group_name" => "Mediums",
            ],

            // Developers
            [
                "name" => "Developers List",
                "group_name" => "Developers",
            ],
            [
                "name" => "Developers Create",
                "group_name" => "Developers",
            ],
            [
                "name" => "Developers Edit",
                "group_name" => "Developers",
            ],
            [
                "name" => "Developers Delete",
                "group_name" => "Developers",
            ],
            [
                "name" => "Developers View",
                "group_name" => "Developers",
            ],

            // Gallery
            [
                "name" => "Galleries List",
                "group_name" => "Galleries",
            ],
            [
                "name" => "Galleries Create",
                "group_name" => "Galleries",
            ],
            [
                "name" => "Galleries Edit",
                "group_name" => "Galleries",
            ],
            [
                "name" => "Galleries Delete",
                "group_name" => "Galleries",
            ],
            [
                "name" => "Galleries View",
                "group_name" => "Galleries",
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                "name" => $permission["name"],
            ], array_merge($permission, ["slug" => Str::slug($permission["name"], "-"), "guard_name" => "web"]));
        }


    }



    public function getUserPermissions()
    {
        $permissions = [
            "Users List",
            "Users Create",
            "Users Edit",
            "Users View",
            "Users Delete",


        ];
        return Permission::whereIn("name", $permissions)->pluck("id")->all();


    }



}
