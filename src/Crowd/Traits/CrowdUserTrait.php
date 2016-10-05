<?php namespace davidlazarte\Crowd\Traits;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use InvalidArgumentException;

trait CrowdUserTrait
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function memberships()
    {
        return $this->hasMany(
            Config::get('crowd.memberships'),
            Config::get('crowd.memberships_table'),
            Config::get('crowd.user_foreign_key'));
    }
}
