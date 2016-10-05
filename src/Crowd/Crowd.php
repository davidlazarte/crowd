<?php namespace davidlazarte\Crowd;

/**
 * This file is part of Crowd,
 * a group-role-permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

class Crowd
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * Create a new confide instance.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }
}
