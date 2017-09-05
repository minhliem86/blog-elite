<?php namespace App\Modules\Admin\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Repositories\StudentRepository;
use App\Repositories\TypeRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use Notification;
use App\Models\Center;

class StudentController extends Controller {
	protected $student;
	protected $type;
	protected $common;

	public $_upload = "public/uploads/students";

	public function __construct(StudentRepository $student, TypeRepository $type, CommonRepository $common)
	{
		$this->student = $student;
		$this->type = $type;
		$this->common = $common;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('Admin::pages.student.index');
	}

	public function getData(Request $request)
	{
		// $student = $this->student->select(['id', 'student_name', 'order', 'status'], ['types']);
		$student = \DB::table('students')->join('types', 'students.type_id', '=', 'types.id')->select('students.id', 'students.student_name', 'students.order', 'students.status', 'types.name');
			return Datatables::of($student)
			->addColumn('action', function($student){
					return '<a href="'.route('admin.student.edit', $student->id).'" class="btn btn-info btn-xs inline-block-span"> Edit </a>
					<form method="POST" action=" '.route('admin.student.destroy', $student->id).' " accept-charset="UTF-8" class="inline-block-span" style="display:inline-block">
							<input name="_method" type="hidden" value="DELETE">
							<input name="_token" type="hidden" value="'.csrf_token().'">
												 <button class="btn  btn-danger btn-xs remove-btn" student="button" attrid=" '.route('admin.student.destroy', $student->id).' " onclick="confirm_remove(this);" > Remove </button>
				 </form>' ;
		 })->editColumn('order', function($student){
				 return "<input type='text' name='order' class='form-control' data-id= '".$student->id."' value= '".$student->order."' />";
		 })->editColumn('status', function($student){
				 $status = $student->status ? 'checked' : '';
				 $student_id =$student->id;
				 return '
							<input type="checkbox"   name="status" value="1" '.$status.'   data-id ="'.$student_id.'">
				';
		 })->filter(function($query) use ($request){
			if ($request->has('name')) {
					$query->where('students.student_name_vi', 'like', "%{$request->input('name')}%")->orWhere('types.name', 'like', "%{$request->input('name')}%");
			}
			})->setRowId('id')->make(true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$center = Center::lists('name_vi', 'id');
		$type = $this->type->lists('name','id');
		return view('Admin::pages.student.create', compact('type', 'center'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, ImageRequest $img_request)
	{
		if($img_request->hasFile('student_img')){
			$img = $this->common->uploadImage($request, $request->file('student_img'), $this->_upload, false);
			$img = $this->common->getPath($img, asset('public/uploads'));
		}else{
			$img = "";
		}
		$order = $this->student->getOrder();
		$data = [
			'student_name' => $request->input('student_name'),
			'slug' => \Unicode::make($request->input('student_name')),
			'student_age' => $request->input('student_age'),
			'student_year' => $request->input('student_year'),
			'student_content_vi' => $request->input('student_content_vi'),
			'student_content_en' => $request->input('student_content_en'),
			'student_img' => $img,
			'type_id' =>$request->input('type_id'),
			'center_id' =>$request->input('center_id'),
			'center_vi' =>Center::find($request->input('center_id'))->name_vi,
			'center_en' =>Center::find($request->input('center_id'))->name,
			'order' => $order,
		];
		$this->student->create($data);
		Notification::success('Created.');
		return redirect()->route('admin.student.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$student = $this->student->find($id);
		$center = Center::lists('name_vi', 'id');
		$type = $this->type->lists('name','id');
		return view('Admin::pages.student.view', compact('student', 'center', 'type'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,ImageRequest $img_request,  $id)
	{
		if($img_request->hasFile('student_img')){
			$img = $this->common->uploadImage($request, $request->file('student_img'), $this->_upload, false);
			$img = $this->common->getPath($img, asset('public/uploads'));
		}else{
			$img = $request->input('student-img-bk');
		}
		$data = [
			'student_name' => $request->input('student_name'),
			'slug' => \Unicode::make($request->input('student_name')),
			'student_age' => $request->input('student_age'),
			'student_year' => $request->input('student_year'),
			'student_content_vi' => $request->input('student_content_vi'),
			'student_content_en' => $request->input('student_content_en'),
			'student_img' => $img,
			'type_id' =>$request->input('type_id'),
			'center_id' =>$request->input('center_id'),
			'center_vi' =>Center::find($request->input('center_id'))->name_vi,
			'center_en' =>Center::find($request->input('center_id'))->name,
			'order' => $request->input('order'),
			'status' => $request->input('status')
		];
		$this->student->update($data, $id);
		Notification::success('Updated.');
		return redirect()->route('admin.student.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->student->delete($id);
		Notification::success('Deleted.');
		return redirect()->route('admin.student.index');
	}

	// DELETE ALL
	public function deleteAll(Request $request)
	{
		if(!$request->ajax()){
			abort(404);
		}else{
			 $data = $request->arr;
			 $response = $this->student->deleteAll($data);
			 return response()->json(['msg' => 'ok']);
		}
	}

	// UPDATE ORDER
	public function postAjaxUpdateOrder(Request $request)
	{
		if(!$request->ajax())
		{
			abort('404', 'Not Access');
		}else{
			$data = $request->input('data');
			foreach($data as $k => $v){
				$upt  =  [
					'order' => $v,
				];
				$obj = $this->student->find($k);
				$obj->update($upt);
			}
			return response()->json(['msg' =>'ok', 'code'=>200], 200);
		}
	}

	// UPDATE STATUS
	public function postAjaxUpdateStatus(Request $request)
	{
		if(!$request->ajax())
        {
            abort('404', 'Not Access');
        }else{
            $value = $request->input('value');
            $id = $request->input('id');
            $this->student->update(['status' => $value], $id);
            return response()->json(['msg' =>'ok', 'code'=>200], 200);
        }
	}

}
