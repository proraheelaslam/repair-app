@extends('admin.layout.new_app')
@section('content')

@php

$job = $data['job'];
$items = $data['job']->items;
$total_amount = 0;


@endphp
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">

            <!--begin::Container-->
            <div class="container">
                <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="margin-top:120px;background-image: url('https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/bg/bg-6.jpg');">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-4 text-white font-weight-boldest mb-10">INVOICE</h1>
                            <div class="d-flex flex-column align-items-md-end px-0">
                                <!--begin::Logo-->
                                <a href="#" class="mb-5">
                                    {{--<img src="{{asset('admin_assets/media/bg/logo-light.png')}}" alt="" />--}}
                                </a>
                                <!--end::Logo-->
                                <span class="text-white d-flex flex-column align-items-md-end opacity-70">
															<span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
															<span>Mississippi 96522</span>
														</span>
                            </div>
                        </div>
                        <div class="border-bottom w-100 opacity-20"></div>
                        <div class="d-flex justify-content-between text-white pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolde mb-2r">DATA</span>
                                <span class="opacity-70">{{$job->invoice->created_at}}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">INVOICE NO.</span>
                                <span class="opacity-70">{{$job->invoice->invoice_id}}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                                <span class="opacity-70">{{$job->customer->name}}
														<br />{{$job->customer->phone_number}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice header-->
                <!-- begin: Invoice body-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="pl-0 font-weight-bold text-muted text-uppercase">Item</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Description</th>
                                    <th class="text-right font-weight-bold text-muted text-uppercase">Cost</th>
                                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Quantity</th>
                                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Price</th>
                                </tr>
                                </thead>
                                <tbody>


                              @if(count($items) > 0)
                                  @foreach($items as $item)
                                      @php

                                           $price  = $item->quantity * $item->price;
                                           $total_amount = $total_amount + $price;

                                      @endphp
                                      <tr class="font-weight-boldest font-size-lg">
                                          <td class="pl-0 pt-7">{{$item->name}}</td>
                                          <td class="text-right pt-7">{{$item->description}}</td>
                                          <td class="text-right pt-7">{{$item->price}}</td>
                                          <td class="text-danger pr-0 pt-7 text-right">{{$item->quantity}}</td>
                                          <td class="text-danger pr-0 pt-7 text-right">{{number_format($price,2)}}</td>
                                      </tr>


                                  @endforeach

                              @endif




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice body-->
                <!-- begin: Invoice footer-->
                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg"  >
                            <div class="d-flex flex-column mb-10 mb-md-0"  >

                            </div>
                            <div class="d-flex flex-column text-md-right">
                                <span class="font-size-lg font-weight-bolder mb-1">TOTAL AMOUNT</span>
                                <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{number_format($total_amount,2)}}</span>
                                <span style="display:none;">Taxes Included</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice footer-->
                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" style="display: none">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice action-->
                <!-- end: Invoice-->

            </div>
        </div>
    </div>



