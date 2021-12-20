<div class="card-body">
<div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('title', '', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-8">
    {!! Form::text('title', isset($jobDetail) ? $jobDetail->title: null, ['class' => ' form-control',
    'id' => 'title', 'placeholder' => 'Enter title']) !!}
    {!! $errors->first('title', '<span class="help-block"><strong>:message</strong></span>') !!}
    </div>
</div>
    <div class="form-group row{{ $errors->has('customer_id') ? ' has-error' : '' }}">
        {!! Form::label('Select Customer', '', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('customer_id', getAllCustomerNames(), isset($jobDetail) ? $jobDetail->customer_id: getAllCustomerNames(), ['class' => ' form-control',
            'id' => 'customer_id', 'placeholder' => 'Please select']) !!}
            {!! $errors->first('customer_id', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
<div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', '', ['class' => 'col-2 col-form-label']) !!}
    <div class="col-8">
        {!! Form::textarea('description', isset($jobDetail) ? $jobDetail->title: null, ['class' => ' form-control',
        'id' => 'description', 'placeholder' => 'Enter description']) !!}
        {!! $errors->first('description', '<span class="help-block"><strong>:message</strong></span>') !!}
    </div>
</div>

</div>

<div class="card-footer">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{url('admin/jobs')}}" class="btn btn-secondary">Cancel</a>
                </div>
    </div>
</div>


@include('admin.common.confirmation_modal')
@section('scripts')
    <script type="text/javascript">
        var delID = 0;

    </script>
@endsection



