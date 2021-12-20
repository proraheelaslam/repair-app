<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Hashids;

class ItemController extends Controller
{
    //
    public $view_path = 'admin/items';
    public $resource  = 'admin/items';

    public function index(){

        try{

            $data['title'] = 'Manage Items';
            $data['resource']      = $this->resource;
            return view($this->view_path.'/list')->with(compact('data'));

        }catch(\Exception $e){
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    public function getAjaxItems($id){

        //$id = last(request()->segments());
        $items  = Item::with('job');
        if ($id != "items"){
            $id = Hashids::decode($id)[0];
            $items->where('job_id',$id);
        }
        $items = $items->get();
        //dd($id);
        // $items = Item::with('job')->where('job_id',$id)->get();
        $resource = $this->resource;
        return DataTables::of($items, $resource)

            ->addColumn('id', function ($item) {
                return $item->id;
            })
            ->addColumn('name', function ($item) {
                return $item->name;
            })
            ->addColumn('price', function ($item) {
                return $item->price;
            })
            ->addColumn('quantity', function ($item) {
                return $item->quantity;
            })
            ->addColumn('job_id', function ($item) {
                return $item->job->title;
            })
            ->addColumn('action', function ($item) use ($resource)  {
                $btn = '';
                $btn = '<a href="'. URL::to($resource.'/'. Hashids::encode($item->id) .'/edit' ) .'" class="btn btn-sm btn-clean btn-icon"><i class="la la-edit"></i></a>&nbsp';
                $btn.= '<a href="javascript:void(0)" onclick="delete_record('. $item->id .')" class="btn btn-sm btn-clean btn-icon"><i class="la la-trash"></i></a>&nbsp';
                return $btn;
            })
            ->rawColumns(['id','action'])
            ->make(true);
    }

    public function getJobItem($id){
        return $this->index();
       // dd($id);
    }

    public function show(){

    }

    public function create()
    {
        try{
            $title = 'Add Item';
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

            $itemId = Hashids::decode($id)[0];
            $title = 'Edit Item';
            $resource = $this->resource;
            $view = $this->view_path;
            $itemDetail = Item::findOrFail($itemId);
            return view($this->view_path.'/edit')->with(compact('title','resource', 'view', 'itemDetail'));

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
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'quantity'=> 'required',
            'job_id'=> 'required',
        ]);

        try{

            Item::create([
                'name'=> $request->name,
                'description'=> $request->description,
                'price'=> $request->price,
                'quantity'=> $request->quantity,
                'job_id'=> $request->job_id,
            ]);
            Session::flash('success_message', 'Item has been created successfully!');
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
            'name'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'quantity'=> 'required',
            'job_id'=> 'required',
        ]);

        try{
            Item::where('id', $id)->update([
                'name'=> $request->name,
                'description'=> $request->description,
                'price'=> $request->price,
                'quantity'=> $request->quantity,
                'job_id'=> $request->job_id,
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
        $item = Item::find($request->id);
        $item->delete();
        echo 'success';
    }
}
