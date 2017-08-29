<?php namespace App\ViewComposers;

use Illuminate\Contracts\View\View;

use App\Repositories\TypeRepository;

class MyViewsComposer {
	  /**
	* Create a new  composer.
	* @return void
	*/

	protected $type;

	public function __construct(TypeRepository $type ) {
		$this->type = $type;
	}

	/**
	* Bind data to the view.
	*
	* @param  View  $view
	* @return void
	*/
	public function compose(View $view) {
		// Code here
        $type_sidebar = $this->type->getAllByStatus(['*'],['students']);
        $view->with('type_sidebar', $type_sidebar);
	}
}
