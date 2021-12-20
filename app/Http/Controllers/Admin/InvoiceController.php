<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Hashids;

class InvoiceController extends Controller
{
    //

    public $view_path = 'admin/invoice';
    public $resource  = 'admin/job/invoice';

    public function getJobInvoice($id){

        try{

            $data['title'] = 'Invoice';
            $data['resource']      = $this->resource;
            //
            $jobId = Hashids::decode($id)[0];
            $job = getItemsByJob($jobId);
            $data['job'] = $job;


            return view($this->view_path.'/job_invoice')->with(compact('data'));

        }catch(\Exception $e){
           /* $responseMessage = $e->getMessage();
            Session::flash('error_message', $responseMessage);
            return redirect($this->resource);*/

        }
    }


    public function changeJobStatus(Request $request){

        $id = $request->id;
        $status = $request->status;
        $totalPrice = Item::where('job_id', $id)->sum('price');
        Invoice::create([
            'invoice_id'=> generateInoviceNumber(),
            'status'=> 'applied',
            'job_id'=> $id,
            'total'=> $totalPrice,
        ]);
    }

}
