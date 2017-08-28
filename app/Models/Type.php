<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

	public $table='types';

  protected $fillable = ['name','order', 'status'];

	public function students()
	{
		return $this->hasMany('App\Models\Student::class');
	}

}
