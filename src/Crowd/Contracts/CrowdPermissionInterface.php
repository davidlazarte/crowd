<?php namespace davidlazarte\Crowd\Contracts;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

interface CrowdPermissionInterface
{
    
    /**
     * Many-to-Many relations with role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();
}
