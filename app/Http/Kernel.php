<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
		'Krucas\Notification\Middleware\NotificationMiddleware',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
		'checkLogin' => 'App\Http\Middleware\CheckLoginMiddleware',
		'checkAdminRole' => 'App\Http\Middleware\CheckAdminRoleMiddleware',

		//CHECK CUSTOMER
		'customer_logined'=>'App\Http\Middleware\RedirectIfAuthCustomer',
		'customer_login_not_yet' => 'App\Http\Middleware\CustomerAuthenticate',
		'check_super_user' => 'App\Http\Middleware\CheckSuperUser',

		'localize' => '\Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes',
		'localizationRedirect' => '\Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter',
		'localeSessionRedirect' => '\Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect',
	];

}
