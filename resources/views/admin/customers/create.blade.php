@extends('admin.layout.new_app')
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">ADD Customer</h3>
                            </div>
                            <!--begin::Form-->

                            {!! Form::open([
                            'method' => 'post',
                            'url' => $resource,
                            'class' => 'form-horizontal',
                            'files' => true,
                            'data-toggle' => 'validator',
                            'data-disable' => 'false',
                            'id' =>'customer_form'
                        ]) !!}
                            <div class="card-body">
                                {{ csrf_field() }}
                                @include($view.'/form')
                            </div>

                        {!! Form::close() !!}

                        <!--end::Form-->
                        </div>
                        <!--end::Card-->


                    </div>
                </div>


            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

@endsection
