<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	public $table =  'students';

    protected $fillable = ['student_name', 'slug', 'student_age', 'student_year', 'student_content', 'center', 'type_id','order', 'status', 'student_img'];

    public function types()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
}
