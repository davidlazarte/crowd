<?php

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Crowd Group Model
    |--------------------------------------------------------------------------
    |
    | This is the Group model used by Crowd to create correct relations.
    | Update the crowd if it is in a different namespace.
    |
    */
    'group' => 'App\Group',

    /*
    |--------------------------------------------------------------------------
    | Crowd Groups Table
    |--------------------------------------------------------------------------
    |
    | This is the groups table used by Crowd to save group to the
    | database.
    |
    */
    'groups_table' => 'groups',

    /*
    |--------------------------------------------------------------------------
    | Crowd Member Model
    |--------------------------------------------------------------------------
    |
    | This is the Member model used by Crowd to create correct relations.
    | Update the membership if it is in a different namespace.
    |
    */
    'membership' => 'App\Membership',

    /*
    |--------------------------------------------------------------------------
    | Crowd Members Table
    |--------------------------------------------------------------------------
    |
    | This is the memberships table used by Crowd to save membership to the
    | database.
    |
    */
    'memberships_table' => 'memberships',

    /*
    |--------------------------------------------------------------------------
    | Crowd Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Crowd to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => 'App\GroupRole',

    /*
    |--------------------------------------------------------------------------
    | Crowd Roles Table
    |--------------------------------------------------------------------------
    |
    | This is the roles table used by Crowd to save roles to the database.
    |
    */
    'roles_table' => 'group_roles',

    /*
    |--------------------------------------------------------------------------
    | Crowd Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Crowd to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => 'App\GroupPermission',

    /*
    |--------------------------------------------------------------------------
    | Crowd Permissions Table
    |--------------------------------------------------------------------------
    |
    | This is the permissions table used by Crowd to save permissions to the
    | database.
    |
    */
    'permissions_table' => 'group_permissions',

    /*
    |--------------------------------------------------------------------------
    | Crowd permission_role Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_role table used by Crowd to save relationship
    | between permissions and roles to the database.
    |
    */
    'permission_role_table' => 'group_permission_group_role',

    /*
    |--------------------------------------------------------------------------
    | Crowd membership_role Table
    |--------------------------------------------------------------------------
    |
    | This is the membership_role table used by Crowd to save assigned roles to the
    | database.
    |
    */
    'membership_role_table' => 'membership_group_role',

    /*
    |--------------------------------------------------------------------------
    | User Foreign key on Crowd's membership Table
    |--------------------------------------------------------------------------
    */
    'user_foreign_key' => 'user_id',

    /*
    |--------------------------------------------------------------------------
    | Group Foreign key on Crowd's membership table
    |--------------------------------------------------------------------------
    */
    'group_foreign_key' => 'group_id',

    /*
    |--------------------------------------------------------------------------
    | Member Foreign key on Crowd's member_role Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'membership_foreign_key' => 'membership_id',

    /*
    |--------------------------------------------------------------------------
    | Role Foreign key on Crowd's role_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'role_foreign_key' => 'role_id',

    /*
    |--------------------------------------------------------------------------
    | Permission Foreign key on Crowd's permission_role Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'permission_foreign_key' => 'permission_id',

    /*
    |--------------------------------------------------------------------------
    | Method to be called in the middleware return case
    | Available: abort|redirect
    |--------------------------------------------------------------------------
    */
    'middleware_handling' => 'abort',

    /*
    |--------------------------------------------------------------------------
    | Parameter passed to the middleware_handling method
    |--------------------------------------------------------------------------
    */
    'middleware_params' => '403',

    /*
    |--------------------------------------------------------------------------
    | Administrator role name
    |--------------------------------------------------------------------------
    */
    'administrator_role' => 'Administrator',

    /*
    |--------------------------------------------------------------------------
    | Non-Member role name
    |--------------------------------------------------------------------------
    */
    'non_member_role' => 'Non-Member',

    /*
    |--------------------------------------------------------------------------
    | Member role name
    |--------------------------------------------------------------------------
    */
    'member_role' => 'Member',

];
