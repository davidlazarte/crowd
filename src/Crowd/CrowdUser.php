<?php

namespace davidlazarte\Crowd;

/**
 * This class is the main entry point of crowd. Usually this the interaction
 * with this class will be done through the Crowd Facade
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use davidlazarte\Crowd\Contracts\CrowdUserInterface;
use davidlazarte\Crowd\Traits\CrowdUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class CrowdUser extends Model implements CrowdUserInterface
{
    use CrowdUserTrait;

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
        $this->table = Config::get('auth.providers.users.table');
    }
}
