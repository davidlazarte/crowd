<?php

namespace davidlazarte\Crowd\Contracts;

/**
 * This file is part of Crowd,
 * a group-role-permission management solution for Laravel.
 *
 * @license MIT
 * @package Crowd
 */

interface CrowdGroupInterface
{
    /**
     * Many-to-Many relations with members model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function memberships();
}
