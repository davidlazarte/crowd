<?php namespace davidlazarte\Crowd\Middleware;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use Closure;
use Illuminate\Contracts\Auth\Guard;

class EntrustPermission
{
	protected $auth;

	/**
	 * Creates a new instance of the middleware.
	 *
	 * @param Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  Closure $next
	 * @param  $permissions
	 * @return mixed
	 */
	public function handle($request, Closure $next, $permissions)
	{
		if ($this->auth->guest() || !$request->user()->can(explode('|', $permissions))) {
			abort(403);
		}

		return $next($request);
	}
}