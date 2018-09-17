
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
                                    </div>
                                     <div class="col-md-2 pull-right">
                                            <div style="width: 150px;" class="input-group"> 
                                                <a href="{{ route('publisher.create')}}">
                                                    <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Add publisher</button> 
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
                                            <form action="{{route('publisher')}}" method="get" id="filter_data">
                                             
                                            <div class="col-md-3">
                                                <input value="{{ (isset($_REQUEST['search']))?$_REQUEST['search']:''}}" placeholder="Search" type="text" name="search" id="search" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" class="btn btn-primary form-control">
                                            </div>
                                           
                                        </form>
                                         <div class="col-md-2">
                                             <a href="{{ route('publisher') }}">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                        </div>
                                       
                                        </div>
                                    </div>
                                      
                                    <table class="table table-striped table-hover table-bordered" id="">
                                        <thead>
                                            <tr>
                                                <td><div class="mt-checkbox-list">
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" onclick="checkAll(this)"> 
                                                    <span></span>
                                                </label>
                                                </div></td>
                                                <th> Sno. </th>
                                                <th> Publisher Name </th>
                                                <th> Company Name </th> 
                                                <th>Created date</th> 
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(!count($results))
                                        <tr> <td colspan="6"><b>Record not found!</b> </td></tr>@endif
                                        @foreach($results as $key => $result)
                                            <tr>
                                                <td><div class="mt-checkbox-list">
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" name="checkAll" id="chk_{{$result->id}}" value="{{$result->id}}">  
                                                    <span></span>
                                                </label>
                                                </div></td>
                                                <td> {{++$key}} </td>
                                                <td> {{$result->publisher}} </td>
                                                <td >   {{ $result->company }}   
                                                </td>
                                                 
                                                 <td>
                                                    {!! Carbon\Carbon::parse($result->created_at)->format('d-m-Y'); !!}
                                                </td>
                                                
                                                <td> 
                                                
                                                 <a href="{{ route('publisher.edit',$result->id)}}">
                                                    <i class="fa fa-edit" title="edit"></i> 
                                                </a> 

                                                    {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('publisher.destroy', $result->id))) !!}
                                                    <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"> <i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                    
                                                     {!! Form::close() !!}

                                                </td>
                                               
                                            </tr>
                                           @endforeach
                                            
                                        </tbody>
                                    </table>
                                     @if($results->count())
                                        <span id="error_msg"></span>
                                        <button class="btn btn-danger" onclick="deleteAll('{{url('admin')}}','publishers')">Delete All</button>
                                   @endif
                                     <div class="center" align="center">  {!! $results->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
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
        