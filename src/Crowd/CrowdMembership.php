<?php namespace davidlazarte\Crowd;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use davidlazarte\Crowd\Contracts\EntrustGroupInterface;
use davidlazarte\Crowd\Traits\EntrustGroupTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class EntrustGroup extends Model implements EntrustGroupInterface
{
    use EntrustGroupTrait;

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
        $this->table = Config::get('crowd.groups_table');
    }
}
