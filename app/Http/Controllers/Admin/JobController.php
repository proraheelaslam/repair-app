<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;
use Hashids;

class JobController extends Controller
{
    //
    public $view_path = 'admin/jobs';
    public $resource  = 'admin/jobs';

    public function index(){

        try{

            $data['title'] = 'Manage Jobs';
            $data['resource']      = $this->resource;
            return view($this->view_path.'/list')->with(compact('data'));

        }catch(\Exception $e){
            $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);

        }
    }

    public function getAjaxJobs(){

        $jobs = Job::with('customer','invoice')->get();
        $resource = $this->resource;
        return DataTables::of($jobs, $resource)

            ->addColumn('id', function ($job) {
                return $job->id;
            })
            ->addColumn('title', function ($job) {
                return $job->title;
            })
            ->addColumn('job_number', function ($job) {
                return $job->job_number;
            })
            ->addColumn('customer_name', function ($job) {
                return $job->customer->name;
            })
            ->addColumn('status', function ($job) {
                if($job->invoice()->count() === 0){
                    if($job->items()->count() === 0){
                        return '<span class="label font-weight-bold label-lg  label-light-primary label-inline">Pending</span>';
                    }else {
                        return '<span data-id="'.$job->id.'" data-status="pending" class="label label-lg font-weight-boldlabel-light-primary label-inline change_invoice_status">Apply for invoice</span>';
                    }


                }else if($job->invoice()->count() > 0){
                    return '<span data-id="'.$job->id.'" data-status="applied" class="label font-weight-bold label-lg  label-light-success label-inline">applied</span>';
                }

            })
            ->addColumn('action', function ($job) use ($resource)  {
                $btn = '';

                if($job->invoice()->count() > 0){
                    $btn .= '<a href="'. URL::to('admin/job/invoice/'. Hashids::encode($job->id)  ) .'" class="btn btn-sm btn-clean btn-icon" title="Invoice"><i class="la la-file-invoice"></i></a>&nbsp';

                }

                $btn .= '<a href="'. URL::to('admin/job/item/'. Hashids::encode($job->id)  ) .'" class="btn btn-sm btn-clean btn-icon" title="Job items"><i class="la  ki ki-menu"></i></a>&nbsp';
                $btn .= '<a href="'. URL::to($resource.'/'. Hashids::encode($job->id) .'/edit' ) .'" class="btn btn-sm btn-clean btn-icon"><i class="la la-edit"></i></a>&nbsp';
                $btn.= '<a href="javascript:void(0)" onclick="delete_record('. $job->id .')" class="btn btn-sm btn-clean btn-icon"><i class="la la-trash"></i></a>&nbsp';
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }




    public function create()
    {
        try{
            $title = 'Add Job';
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

            $jobId = Hashids::decode($id)[0];
            $title = 'Edit Job';
            $resource = $this->resource;
            $view = $this->view_path;
            $jobDetail = Job::findOrFail($jobId);
            return view($this->view_path.'/edit')->with(compact('title','resource', 'view', 'jobDetail'));

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
            'description'=> 'required',
            'customer_id'=> 'required'
        ]);

        try{
            Job::create([
                'title'=> $request->title,
                'description'=> $request->description,
                'customer_id'=> $request->customer_id,
                'job_number'=> getJobNumber(),
            ]);
            Session::flash('success_message', 'Job has been created successfully!');
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
            Job::where('id', $id)->update([
                'title' => $request->title,
            ]);
            Session::flash('success_message', 'Job has been updated successfully!');
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
        $job = Job::find($request->id);
        $job->delete();
        echo 'success';
    }




}
