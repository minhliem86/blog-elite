<?php namespace App\Modules\Frontend\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repositories\StudentRepository;
use App\Repositories\TypeRepository;
use App\Models\Student;

class HomeController extends Controller {
    protected $type;
    protected $student;

    public function __construct(StudentRepository $student, TypeRepository $type)
    {
        $this->type = $type;
        $this->student = $student;
    }

    public function index()
    {
        $student = $this->student->paginate(2,['*'], ['types']);
        $type = $this->type->all(['*'], ['students']);
        return view('Frontend::pages.index', compact('student', 'type'));
    }
}
