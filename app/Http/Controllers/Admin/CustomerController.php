<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DataTables;
use Illuminate\Support\Facades\URL;
use Hashids;

class CustomerController extends Controller
{
    //

    public $view_path = 'admin/customers';
    public $resource  = 'admin/customers';

    public function index(){

        try{

            $data['title'] = 'Manage Customers';
            $data['resource']      = $this->resource;
            return view($this->view_path.'/list')->with(compact('data'));

        }catch(\Exception $e){
            //QUERY EXCEPTION
            // $responseMessage = Lang::get('api.Something is going wrong.');
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    public function getAjaxCustomers(){

        $customers = Customer::get();
        $resource = $this->resource;
        return DataTables::of($customers, $resource)

            ->addColumn('id', function ($customer) {
                return $customer->id;
            })
            ->addColumn('name', function ($customer) {
                return $customer->name;
            })
            ->addColumn('email', function ($customer) {
                return $customer->email;
            })
            ->addColumn('phone_number', function ($customer) {
                return $customer->phone_number;
            })
            ->addColumn('gst_number', function ($customer) {
                return $customer->gst_number;
            })
            ->addColumn('action', function ($customer) use ($resource)  {
                $btn = '';
                $btn = '<a href="'. URL::to($resource.'/'. Hashids::encode($customer->id) .'/edit' ) .'" class="btn btn-sm btn-clean btn-icon"><i class="la la-edit"></i></a>&nbsp';
                $btn.= '<a href="javascript:void(0)" onclick="delete_record('. $customer->id .')" class="btn btn-sm btn-clean btn-icon"><i class="la la-trash"></i></a>&nbsp';
                return $btn;
            })
            ->rawColumns(['id', 'name','action'])
            ->make(true);
    }

    public function create()
    {
        try{
            $title = 'Add Customer';
            $resource = $this->resource;
            $view = $this->view_path;
            return view($this->view_path.'/create')->with(compact('title','resource', 'view'));
        }catch(\Exception $e){
            //QUERY EXCEPTION
            // $responseMessage = Lang::get('api.Something is going wrong.');
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    public function edit($id){
        try{

            $customer_id = Hashids::decode($id)[0];
            $title = 'Edit Customer';
            $resource = $this->resource;
            $view = $this->view_path;
            $customerDetail = Customer::findOrFail($customer_id);
            return view($this->view_path.'/edit')->with(compact('title','resource', 'view', 'customerDetail'));

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
        $rules['name'] = 'required';
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|unique:customers,email',
            'phone_number'=> 'required',
            'gst_number'=> 'required',
            'password'=> 'required',
        ]);

        try{

            $requestData  = $request->all();
            $requestData['password'] = bcrypt($request->password);
            Customer::create($requestData);
            Session::flash('success_message', 'Customer has been created successfully!');
            return redirect($this->resource);

        }catch(\Exception $e){
            //QUERY EXCEPTION
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required',
            'phone_number'=> 'required',
            'gst_number'=> 'required',
            'password'=> 'required',
        ]);

        try{

            //$requestData['password'] = bcrypt($request->password);
            Customer::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'gst_number' => $request->gst_number,
            ]);
            Session::flash('success_message', 'Customer has been updated successfully!');
            return redirect($this->resource);

        }catch(\Exception $e){
            //QUERY EXCEPTION
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
        $customer = Customer::find($request->id);
        $customer->delete();
        echo 'success';
    }

}
