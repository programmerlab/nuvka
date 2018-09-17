

<div class="form-body">
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> Please fill the required field! </div>
  <!--   <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
-->
 
    <div class="form-group {{ $errors->first('firstName', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
        <label class="control-label col-md-3">First Name <span class="required"> * </span></label>
        <div class="col-md-4"> 
            {!! Form::text('firstName',null, ['class' => 'form-control','data-required'=>1])  !!} 
            
            <span class="help-block" style="color:red">{{ $errors->first('firstName', ':message') }} </span>
        </div>
    </div> 

     <div class="form-group {{ $errors->first('lastName', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
        <label class="control-label col-md-3">Last Name <span class="required"> * </span></label>
        <div class="col-md-4"> 
            {!! Form::text('lastName',null, ['class' => 'form-control','data-required'=>1])  !!} 
            
            <span class="help-block" style="color:red">{{ $errors->first('lastName', ':message') }} </span> 
        </div>
    </div> 

     <div class="form-group {{ $errors->first('email', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
        <label class="control-label col-md-3">Email <span class="required"> * </span></label>
        <div class="col-md-4"> 
            {!! Form::email('email',null, ['class' => 'form-control','data-required'=>1])  !!} 
            
            <span class="help-block" style="color:red">{{ $errors->first('email', ':message') }} </span>
        </div>
    </div> 

    <div class="form-group {{ $errors->first('phone1', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
        <label class="control-label col-md-3">Phone <span class="required"> * </span></label>
        <div class="col-md-4"> 
            {!! Form::text('phone1',null, ['class' => 'form-control','data-required'=>1])  !!} 
            
            <span class="help-block" style="color:red">{{ $errors->first('phone1', ':message') }} </span>
        </div>
    </div> 

    <div class="form-group {{ $errors->first('category_group_name', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
        <label class="control-label col-md-3">Group Category Name <span class="required"> * </span></label>
        <div class="col-md-4"> 
            {!! Form::text('category_group_name',null, ['class' => 'form-control','data-required'=>1])  !!} 
            
            <span class="help-block" style="color:red">{{ $errors->first('category_group_name', ':message') }} @if(session('field_errors')) {{ 'The Group Category name already been taken!' }} @endif</span>
        </div>
    </div> 
    
   
    
    <div class="form-group {{ $errors->first('description', ' has-error') }}">
        <label class="control-label col-md-3">Address<span class="required"> </span></label>
        <div class="col-md-4"> 
            {!! Form::textarea('description',null, ['class' => 'form-control','data-required'=>1,'rows'=>3,'cols'=>5])  !!} 
            
            <span class="help-block">{{ $errors->first('description', ':message') }}</span>
        </div>
    </div> 
    
    
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
          {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}


           <a href="{{route('category')}}">
{!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>
</div>




<div class="form-body">





</div> 

