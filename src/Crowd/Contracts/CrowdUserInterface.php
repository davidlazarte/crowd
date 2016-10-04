<?php namespace davidlazarte\Crowd\Contracts;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

interface CrowdUserInterface
{
    /**
     * One-to-Many relations with the group model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function memberships();
}
