<style type="text/css">
    li.multiselect-all,li.multiselect-item {
        margin-left: 25px;
    }
    ul.multiselect-container > li{
        margin-left: 25px;
    }
</style> 

<div class="form-body">
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> Please fill the required field! </div>
    <!--   <div class="alert alert-success display-hide">
          <button class="close" data-close="alert"></button> Your form validation is successful! </div>
    -->

    <div class="form-group {{ $errors->first('product_category', ' has-error') }}">
        <label class="control-label col-md-3">Product Category
            <span class="required">  </span>
        </label>
        <div class="col-md-6"> 
            <div class="portlet-body">
                <select class="form-control" name="product_category" >   
                    <option value="">Select Category</option>
                    @foreach($categories as $key=>$value)
                    <option value="{{$value->id}}" @if(isset($category_id) && (in_array($value->id,$category_id))) {{ 'selected="selected"'}}  @endif

                            @if($value->id==old('product_category'))  {{ 'selected="selected"'}} @endif
                            >

                            {{ $value->category_name }}

                </option>
                @endforeach
            </select>
        </div>
        <span class="help-block">{{ $errors->first('product_category', ':message') }}</span>
    </div>
</div> 


<div class="form-group {{ $errors->first('product_title', ' has-error') }}">
        <label class="control-label col-md-3">Product Title <span class="required"> * </span></label>
        <div class="col-md-6"> 
            {!! Form::text('product_title',null, ['class' => 'form-control','data-required'=>1])  !!} 

            <span class="help-block">{{ $errors->first('product_title', ':message') }}</span>
        </div>
    </div>  
   

    <div class="form-group {{ $errors->first('price', ' has-error') }}">
        <label class="control-label col-md-3">Product price <span class="required"> * </span></label>
        <div class="col-md-6"> 
            {!! Form::text('price',null, ['class' => 'form-control','data-required'=>1])  !!} 

            <span class="help-block">{{ $errors->first('price', ':message') }}</span>
        </div>
    </div>  



<div class="form-group{{ $errors->first('description', ' has-error') }}">
    <label class="control-label col-md-3">Description</label>
    <div class="col-md-8"> 
        {!! Form::textarea('description',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
        <span class="label label-danger">{{ $errors->first('description', ':message') }}</span>
        @if(Session::has('flash_alert_notice')) 
        <span class="label label-danger">
            {{ Session::get('flash_alert_notice') }} 
        </span>@endif
    </div>
</div> 



<div class="form-group hide {{ $errors->first('discount', 'has-error') }}">
    <label class="control-label col-md-3">Discount  </label>
    <div class="col-md-6"> 
        {!! Form::number('discount',null, ['class' => 'form-control','min'=>1])  !!} 

        <span class="help-block">{{ $errors->first('discount', ':message') }}</span>
    </div>
</div> 


     <div class="form-group{{ $errors->first('photo', ' has-error') }}">
        <label class="control-label col-md-3">Product Image</label>
        <div class="col-md-6">  

             {!! Form::file('photo',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
             @if(!empty($product->photo))
                 <img src="{!! Url::to('storage/uploads/products/'.$product->photo) !!}" width="100px">
                 <input type="hidden" name="photo" value="{!! $product->photo !!}">
             @endif                                       
            <span class="label label-danger">{{ $errors->first('photo', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>


<div class="form-group hide {{ $errors->first('currency', 'has-error') }}">
    <label class="control-label col-md-3">Currency  </label>
    <div class="col-md-6"> 
        {!! Form::text('currency','INR', ['class' => 'form-control'])  !!} 

        <span class="help-block">{{ $errors->first('currency', ':message') }}</span>
    </div>
</div>

<div class="form-group {{ $errors->first('status', 'has-error') }}">
    <label class="control-label col-md-3">status  </label>
    <div class="col-md-6"> 
        <select name="status" class="form-control">
            <option value="publish">Publish</option>
            <option value="unpublish">Unpublish</option>
        </select>

        <span class="help-block">{{ $errors->first('status', ':message') }}</span>
    </div>
</div>  
<!-- <div class="form-group {{ $errors->first('photo', ' has-error') }}">
    <label class="control-label col-md-3">Images  </label>
    <div class="col-md-6"> 
          {!! Form::file('photo',null,['class' => 'form-control'])  !!}
     <br>
      @if(isset($reports->photo))
      <img src="{!! Url::to('storage/reports/'.$reports->photo) !!}" width="150px">
      @endif                                   
    <span class="label label-danger">{{ $errors->first('photo', ':message') }}</span>
    @if(Session::has('flash_alert_notice')) 
    <span class="label label-danger">

        {{ Session::get('flash_alert_notice') }} 

    </span>@endif

    </div>
</div>  --> 

<div class="form-group {{ $errors->first('meta_title', 'has-error') }}">
    <label class="control-label col-md-3">Meta title  </label>
    <div class="col-md-6"> 
        {!! Form::text('meta_title',null, ['class' => 'form-control'])  !!} 

        <span class="help-block">{{ $errors->first('meta_title', ':message') }}</span>
    </div>
</div>

<div class="form-group {{ $errors->first('meta_key', 'has-error') }}">
    <label class="control-label col-md-3">Meta key  </label>
    <div class="col-md-6"> 
        {!! Form::text('meta_key',null, ['class' => 'form-control'])  !!} 

        <span class="help-block">{{ $errors->first('meta_key', ':message') }}</span>
    </div>
</div>

<div class="form-group {{ $errors->first('meta_description', 'has-error') }}">
    <label class="control-label col-md-3">Meta Description  </label>
    <div class="col-md-8"> 
        {!! Form::textarea('meta_description',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
        <span class="label label-danger">{{$errors->first('meta_description', ':message') }}</span>
        @if(Session::has('flash_alert_notice')) 
        <span class="label label-danger">
            {{ Session::get('flash_alert_notice') }} 
        </span>@endif
    </div>
</div>


</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <!--  {!! Form::button(' Save ', ['class'=>'btn save  btn-primary text-white','id'=>'saveBtn']) !!} -->
            {!! Form::submit('Save', ['class'=>'btn save btn-primary text-white','id'=>'saveBtn']) !!}


            <a href="{{route('reports')}}">
                {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} 
            </a>
        </div>
    </div>
</div>

