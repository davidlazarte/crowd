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
        return $this->belongsToMany(
            Config::get('crowd.membership'),
            Config::get('crowd.membership_table'),
            Config::get('crowd.group_foreign_key'),
            Config::get('crowd.member_foreign_key')
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
}
