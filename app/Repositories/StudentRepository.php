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

    public function first($columns = ['*'], $with= [])
    {
        $query = $this->make($with);
        return $query->first($columns);
    }
}
