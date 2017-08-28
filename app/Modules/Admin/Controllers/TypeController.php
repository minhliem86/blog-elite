<?php namespace App\Modules\Admin\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Repositories\TypeRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use Notification;

class TypeController extends Controller {
	protected $type;

	public function __construct(TypeRepository $type)
	{
		$this->type = $type;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('Admin::pages.type.index');
	}

	public function getData(Request $request)
	{
		$type = $this->type->select(['id', 'name', 'order', 'status']);
			return Datatables::of($type)
			->addColumn('action', function($type){
					return '<a href="'.route('admin.type.edit', $type->id).'" class="btn btn-info btn-xs inline-block-span"> Edit </a>
					<form method="POST" action=" '.route('admin.type.destroy', $type->id).' " accept-charset="UTF-8" class="inline-block-span" style="display:inline-block">
							<input name="_method" type="hidden" value="DELETE">
							<input name="_token" type="hidden" value="'.csrf_token().'">
												 <button class="btn  btn-danger btn-xs remove-btn" type="button" attrid=" '.route('admin.type.destroy', $type->id).' " onclick="confirm_remove(this);" > Remove </button>
				 </form>' ;
		 })->editColumn('order', function($type){
				 return "<input type='text' name='order' class='form-control' data-id= '".$type->id."' value= '".$type->order."' />";
		 })->editColumn('status', function($type){
				 $status = $type->status ? 'checked' : '';
				 $type_id =$type->id;
				 return '
							<input type="checkbox"   name="status" value="1" '.$status.'   data-id ="'.$type_id.'">
				';
		 })->filter(function($query) use ($request){
			if ($request->has('name')) {
					$query->where('name', 'like', "%{$request->input('name')}%");
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
		return view('Admin::pages.type.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$order = $this->type->getOrder();
		$data = [
			'name' => $request->input('name'),
			'slug' => \Unicode::make($request->input('name')),
			'order' => $order,
		];
		$this->type->create($data);
		Notification::success('Created.');
		return redirect()->route('admin.type.index');
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
		$type = $this->type->find($id);
		return view('Admin::pages.type.view', compact('type'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$data = [
			'name' => $request->input('name'),
			'slug' => \Unicode::make($request->input('name')),
			'order' => $request->input('order'),
			'status' => $request->input('status'),
		];
		$this->type->update($data, $id);
		Notification::success('Updated.');
		return redirect()->route('admin.type.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->type->delete($id);
		Notification::success('Deleted.');
		return redirect()->route('admin.type.index');
	}

	// DELETE ALL
	public function deleteAll(Request $request)
	{
		if(!$request->ajax()){
			abort(404);
		}else{
			 $data = $request->arr;
			 $response = $this->type->deleteAll($data);
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
				$obj = $this->type->find($k);
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
            $this->type->update(['status' => $value], $id);
            return response()->json(['msg' =>'ok', 'code'=>200], 200);
        }
	}



}
