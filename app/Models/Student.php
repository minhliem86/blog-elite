<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	public $table =  'students';

    protected $fillable = ['student_name', 'slug', 'student_age', 'student_year', 'student_content_vi', 'student_content_en', 'center_vi', 'center_en', 'center_id', 'type_id','order', 'status', 'student_img','img_cover'];

    public function types()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
}
