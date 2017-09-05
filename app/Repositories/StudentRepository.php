<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Student;
use Auth;

class StudentRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return get_class(new Student);
    }

    public function firstByWhere($field,$value, $columns = ['*'], $with= [])
    {
        $query = $this->make($with);
        return $query->where($field,$value)->first($columns);
    }

    public function getByOrderStudentPaginate($limit = 10, $columns = ['*'], $with = [])
    {
        $query = $this->make($with);
        return $query->where('status',1)->OrderBy('order', 'ASC')->paginate($limit, $columns);
    }
}
