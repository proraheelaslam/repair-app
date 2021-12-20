<div class="card-body">

    <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">

        {!! Form::label('name', '', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
        {!! Form::text('name', isset($categoryDetail) ? $categoryDetail->title: null, ['class' => ' form-control',
        'id' => 'name', 'placeholder' => 'Enter name']) !!}
        {!! $errors->first('name', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('job_id') ? ' has-error' : '' }}">
        {!! Form::label('Select Job', '', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('job_id', getAllJobNames(), isset($itemDetail) ? $itemDetail->job_id: getAllJobNames(), ['class' => ' form-control',
            'id' => 'job_id', 'placeholder' => 'Please select']) !!}
            {!! $errors->first('job_id', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>

    <div class="form-group row{{ $errors->has('price') ? ' has-error' : '' }}">
        {!! Form::label('price', '', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
        {!! Form::number('price', isset($itemDetail) ? $itemDetail->title: null, ['class' => ' form-control',
        'id' => 'price', 'placeholder' => 'Enter price']) !!}
        {!! $errors->first('name', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('quantity') ? ' has-error' : '' }}">

        {!! Form::label('quantity', '', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
        {!! Form::number('quantity', isset($itemDetail) ? $itemDetail->title: null, ['class' => ' form-control',
        'id' => 'quantity', 'placeholder' => 'Enter price']) !!}
        {!! $errors->first('name', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description', '', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::textarea('description', isset($itemDetail) ? $itemDetail->title: null, ['class' => ' form-control',
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
    <a href="{{url('admin/items')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>


@include('admin.common.confirmation_modal')
@section('scripts')
    <script type="text/javascript">
        var delID = 0;


    </script>
@endsection



