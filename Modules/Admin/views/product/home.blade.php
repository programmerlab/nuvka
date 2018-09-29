
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD--> 
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        @include('packages::partials.breadcrumb')

        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">{{ $heading }}</span>
                            <span>(Total product : {{$report_count}})</span>
                        </div>
                        <div class="col-md-2 pull-right">
                            <div style="width: 150px;" class="input-group"> 
                                <a href="{{ route('product.create')}}">
                                    <button  class="btn btn-danger"><i class="fa fa-plus-circle"></i> Create product</button> 
                                </a>
                            </div>
                        </div>
                        


                    </div>

                    @if(Session::has('flash_alert_notice'))
                    <div class="alert alert-success alert-dismissable" style="margin:10px">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <i class="icon fa fa-check"></i>  
                        {{ Session::get('flash_alert_notice') }} 
                    </div>
                    @endif
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <form action="{{route('product')}}" method="get" id="filter_data">

                                    <div class="col-md-3">
                                        <input value="{{ (isset($_REQUEST['search']))?$_REQUEST['search']:''}}" placeholder="Search " type="text" name="search" id="search" class="form-control" >
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="Search" class="btn btn-primary form-control">
                                    </div>

                                </form>
                                <div class="col-md-2">
                                    <a href="{{ route('product') }}">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                </div>

                            </div>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover table-bordered" id="contact">
                                <thead>
                                    <tr>
                                        <td><div class="mt-checkbox-list">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" onclick="checkAll(this)"> 
                                            <span></span>
                                        </label>
                                        </div></td>
                                        <th>Sno</th> 
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th> 
                                        <th>Price</th>
                                        <th>Discount</th>
                                        
                                        
                                        <th>Created Date</th> 
                                        <th>Action</th>
                                    </tr>
                                    @if(count($products)==0)
                                    <tr>
                                        <td colspan="8">
                                            <div class="alert alert-danger alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                                <i class="icon fa fa-check"></i>  
                                                {{ 'Record not found. !' }}
                                            </div>
                                        </td>
                                    </tr>
                                    @endif

                                </thead>
                                <tbody>
                                    @foreach ($products  as $key => $result)  
                                    <tr>
                                        <td><div class="mt-checkbox-list">
                                        <label class="mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="checkAll" id="chk_{{$result->id}}" value="{{$result->id}}">  
                                            <span></span>
                                        </label>
                                        </div></td>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <a href="#" target="_blank"> 
                                                {!! ucfirst($result->product_title)     !!} 
                                            </a>
                                        </td> 
                                        <td>
                                            {!! substr(strip_tags($result->description),0,50) !!}...<a href="{{ route('product.show',$result->id)}}">
                                                <i class="glyphicon glyphicon-eye-open" title="view"></i> 
                                            </a>
                                        </td> 
                                        <td>
                                            {!! isset($result->category->category_name)?ucfirst($result->category->category_name):'NA' !!} 
                                        </td>

                                        <td>
                                            {!! ucfirst($result->price)     !!}
                                        </td>

                                        <td>
                                            {!! ucfirst($result->discount)     !!}
                                        </td>
                                        <td>
                                            {!! Carbon\Carbon::parse($result->created_at)->format('d-m-Y'); !!}
                                        </td>

                                        <td> 
                                            <a href="{{ route('product.edit',$result->id)}}">
                                                 <button class='delbtn btn btn-success btn-xs' type="submit" name="remove_levels" value="edit">
                                                 <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> </i></button> 

                                            </a>

                                            {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE','style'=>"margin-top: 10px",  'id'=>'deleteForm_'.$result->id, 'route' => array('product.destroy', $result->id))) !!}
                                            <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button> 
                                            {!! Form::close() !!} 
                                        </td>
                                    </tr>
                                    @endforeach 

                                </tbody>

                            </table>
                            @if($products->count())
                                <span id="error_msg"></span>
                                <button class="btn btn-danger" onclick="deleteAll('{{url('admin')}}','products')">Delete All</button>
                           @endif
                                <div class="center" align="center">  {!! $products->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
                        </div>
                    </div>

                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div> 
<!-- END QUICK SIDEBAR -->
</div> 



<form id="import_csv" action="" method="post" encytype="multipart/form-data">
    <input type="hidden" id="url_action" name="action" value="admin/products/import">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" id="redirect_action" name="action" value="admin/product">
    <div id="responsive2" class="modal fade" tabindex="-1" data-width="300">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #efeb10 !important">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Import Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Import excel file</h4>
                            <p><a href="{{ url('storage/csv/product.xls') }}">download excel sample</a></p>
                            <span id="error_msg2"></span>
                            <p>
                                <input type="file" class="col-md-12 form-control" name="importCsv" id="importCsv"> </p> 
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">

                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <button type="submit" class="btn red" id="csave" >Imort</button>
                </div>
            </div>
        </div>
    </div>
</form>