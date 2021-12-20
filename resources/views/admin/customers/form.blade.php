<div class="card-body">
    <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">

        {!! Form::label('name', 'Name', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('name', isset($customerDetail) ? $customerDetail->name: null, ['class' => ' form-control',
            'id' => 'name', 'placeholder' => 'Enter name']) !!}
            {!! $errors->first('name', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">

        {!! Form::label('email', 'Email', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('email', isset($customerDetail)?$customerDetail->email:null, ['class' => ' form-control',
            'id' => 'email', 'placeholder' => 'Enter email']) !!}
            {!! $errors->first('email', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('phone_number') ? ' has-error' : '' }}">

        {!! Form::label('phone_number', 'Phone Number', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('phone_number', isset($customerDetail)?$customerDetail->phone_number:null, ['class' => ' form-control',
            'id' => 'phone_number', 'placeholder' => 'Enter phone number']) !!}
            {!! $errors->first('phone_number', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('gst_number') ? ' has-error' : '' }}">

        {!! Form::label('gst_number', 'Gst Number', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::text('gst_number', isset($customerDetail)?$customerDetail->gst_number:null, ['class' => ' form-control',
            'id' => 'gst_number', 'placeholder' => 'Enter gst number']) !!}
            {!! $errors->first('gst_number', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
    <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', 'Password', ['class' => 'col-2 col-form-label']) !!}
        <div class="col-8">
            {!! Form::password('password', ['class' => 'form-control',
            'id' => 'password', 'placeholder' => 'Enter password']) !!}
            {!! $errors->first('password', '<span class="help-block"><strong>:message</strong></span>') !!}
        </div>
    </div>
</div>

<div class="card-footer">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
       <a  href="{{url('admin/customers')}}" class="btn btn-secondary">Cancel</a>
</div>
    </div>
</div>


@include('admin.common.confirmation_modal')
@section('scripts')
    <script type="text/javascript">
        var delID = 0;


    </script>
@endsection



