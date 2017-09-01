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
        $student = $this->student->getByOrderStudentPaginate(10,['*'], ['types']);
        return view('Frontend::pages.index', compact('student'));
    }

    public function detail($slug)
    {
        $student = $this->student->firstByWhere('slug',$slug,['*'], ['types']);
        return view('Frontend::pages.detail', compact('student'));
    }

    public function loadmore(Request $request)
    {
        if($request->ajax())
        {
            $type_id = $request->input('type_id');
            $type = $this->type->find($type_id,['*'],['students']);
            $view = view('Frontend::ajax.loadStudentSidebar', compact('type'))->render();
            return response()->json(['rs' => $view]);
        }
    }

    public function testLanguage()
    {
        return view('Frontend::pages.language');
    }
}
