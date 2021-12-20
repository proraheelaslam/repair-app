<div class="card-body">
    <div class="form-group row{{ $errors->has('title') ? ' has-error' : '' }}">

        {!! Form::label('title', '', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('title', isset($categoryDetail) ? $categoryDetail->title: null, ['class' => ' form-control',
                   'id' => 'title', 'placeholder' => 'Enter title']) !!}
            {!! $errors->first('title', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
</div>

<div class="card-footer">
    <div class="row">
        <div class="col-2"></div>
           <div class="col-10">
           {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
           <a href="{{url('admin/categories')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>


@include('admin.common.confirmation_modal')
@section('scripts')
    <script type="text/javascript">
        var delID = 0;


    </script>
@endsection



