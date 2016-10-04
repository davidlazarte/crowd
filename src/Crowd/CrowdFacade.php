<?php namespace davidlazarte\Crowd;

/**
 * This file is part of Crowd,
 * a group-role-permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use Illuminate\Support\Facades\Facade;

class EntrustFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'crowd';
    }
}
