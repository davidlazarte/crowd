<?php namespace davidlazarte\Crowd;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use davidlazarte\Crowd\Contracts\CrowdPermissionInterface;
use davidlazarte\Crowd\Traits\CrowdPermissionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class CrowdPermission extends Model implements CrowdPermissionInterface
{
    use CrowdPermissionTrait;

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
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('crowd.permissions_table');
    }

}
