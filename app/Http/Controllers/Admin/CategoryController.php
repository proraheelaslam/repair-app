<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    //

    public $view_path = 'admin/categories';
    public $resource  = 'admin/categories';

    public function index(){

        try{

            $data['title'] = 'Manage Categories';
            $data['resource']      = $this->resource;
            return view($this->view_path.'/list')->with(compact('data'));

        }catch(\Exception $e){
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    public function getAjaxCategories(){

        $categories = Category::get();
        $resource = $this->resource;
        return DataTables::of($categories, $resource)

            ->addColumn('id', function ($category) {
                return $category->id;
            })
            ->addColumn('title', function ($category) {
                return $category->title;
            })
            ->addColumn('action', function ($category) use ($resource)  {
                $btn = '';
                $btn = '<a href="'. URL::to($resource.'/'. Hashids::encode($category->id) .'/edit' ) .'" class="btn btn-sm btn-clean btn-icon"><i class="la la-edit"></i></a>&nbsp';
                $btn.= '<a href="javascript:void(0)" onclick="delete_record('. $category->id .')" class="btn btn-sm btn-clean btn-icon"><i class="la la-trash"></i></a>&nbsp';
                return $btn;
            })
            ->rawColumns(['id','action'])
            ->make(true);
    }

    public function create()
    {
        try{
            $title = 'Add Category';
            $resource = $this->resource;
            $view = $this->view_path;
            return view($this->view_path.'/create')->with(compact('title','resource', 'view'));
        }catch(\Exception $e){
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    public function edit($id){
        try{

            $customer_id = Hashids::decode($id)[0];
            $title = 'Edit Category';
            $resource = $this->resource;
            $view = $this->view_path;
            $categoryDetail = Category::findOrFail($customer_id);
            return view($this->view_path.'/edit')->with(compact('title','resource', 'view', 'categoryDetail'));

        }catch(\Exception $e){
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
        ]);

        try{

            Category::create([
                'title'=> $request->title
            ]);
            Session::flash('success_message', 'Category has been created successfully!');
            return redirect($this->resource);

        }catch(\Exception $e){
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required',
        ]);

        try{
            Category::where('id', $id)->update([
                'title' => $request->title,
            ]);
            Session::flash('success_message', 'Category has been updated successfully!');
            return redirect($this->resource);

        }catch(\Exception $e){
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $category = Category::find($request->id);
        $category->delete();
        echo 'success';
    }
}
