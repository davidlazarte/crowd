<?php namespace davidlazarte\Crowd;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use davidlazarte\Crowd\Contracts\CrowdRoleInterface;
use davidlazarte\Crowd\Traits\CrowdRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class CrowdRole extends Model implements CrowdRoleInterface
{
    use CrowdRoleTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('crowd.roles_table');
    }

}
