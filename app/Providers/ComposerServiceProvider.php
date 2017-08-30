<?php  namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

class ComposerServiceProvider extends ServiceProvider {

  /**
  * Register bindings in the container.
  *
  * @return void
  */
  public function boot() {
  // Using class based composers...
  View::composer(['Frontend::layouts.mobile-menu', 'Frontend::layouts.sidebar_content', 'Frontend::layouts.navi_type'], 'App\ViewComposers\MyViewsComposer');
  }

  /**
  * Register
  *
  * @return void
  */
  public function register() {

  }
}
