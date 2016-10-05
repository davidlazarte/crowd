<?php namespace davidlazarte\Crowd\Traits;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Crowd
 */

use Illuminate\Support\Facades\Config;

trait CrowdGroupTrait
{
    /**
     * Many-to-Many relations with Membership model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function memberships()
    {
        return $this->hasMany(
            Config::get('crowd.membership'),
            Config::get('crowd.group_foreign_key')
        );
    }

    /**
     * Boot the permission model
     * Attach event listener to remove the many-to-many records when trying to delete
     * Will NOT delete any records if the crowd model uses soft deletes.
     *
     * @return void|bool
     */
    public static function bootCrowdGroupTrait()
    {
        static::deleting(function ($group) {
            if (!method_exists(Config::get('crowd.group'), 'bootSoftDeletes')) {
                $group->members()->sync([]);
            }

            return true;
        });
    }

    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param mixed $role
     */
    public function attachMembership($user, $role = null)
    {
        $membership = $this->memberships()
            ->where(Config::get('crowd.user_foreign_key'), $user->id)
            ->first();

        if (empty($membership))
        {
            $membership = Config::get('crowd.membership');
            $membership = $membership::create([
                Config::get('crowd.group_foreign_key') => $this->id,
                Config::get('crowd.user_foreign_key') => $user->id,
            ]);
            $membership->save();
            $roleModel = Config::get('crowd.role');
            $memberRole = $roleModel::where('name', '=', Config::get('crowd.member_role'))->first();
            $membership->attachRole($memberRole);
        }

        if (empty($role)) {
            return;
        }

        $membership->attachRole($role);
    }
}
