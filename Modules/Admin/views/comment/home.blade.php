
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
                                            <form action="{{route('comment')}}" method="get" id="filter_data">
                                             
                                            <div class="col-md-3">
                                                <input value="{{ (isset($_REQUEST['search']))?$_REQUEST['search']:''}}" placeholder="Task Title" type="text" name="search" id="search" class="form-control" >
                                            </div>
                                            <div class="col-md-3">
                                                {!! Form::text('taskdate',null, ['id'=>'taskdate','class' => 'form-control taskdate','data-required'=>1,"size"=>"16","data-date-format"=>"yyyy-mm-dd","placeholder"=>'Comment Date'])  !!} 
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" class="btn btn-primary form-control">
                                            </div>
                                           
                                        </form>
                                         <div class="col-md-2">
                                             <a href="{{ route('comment') }}">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                        </div>
                                       
                                        </div>
                                    </div>
                                     
                                    <table class="table table-striped table-hover table-bordered" id="">
                                        <thead>
                                            <tr>
                                                 <th> Sno</th>
                                                <th> Task Title </th>
                                                <th> Posted By </th>  
                                                <th> Comment </th> 
                                                <th>Created Date</th> 
                                                 <th></th> 
                                                 <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $key => $result)
                                        @if(isset($result->taskDetail) && isset($result->userDetail))
                                            <tr>
                                            <td> {{ (($comments->currentpage()-1)*15)+(++$key) }}</td>
                                              
                                                <td> <a href="{{route('postTask.show',$result->taskDetail->id)}}"> {{ ucfirst($result->taskDetail->title)}}</a></td>
                                                <td>  

                                                @if(isset($result->userDetail->first_name))
                                                    {{ $result->userDetail->first_name.' '. $result->userDetail->last_name }}
                                                @endif

                                               </td>
                                                <td>{{ $result->commentDescription}}</td>
                                                <td> 
                                                    {!! Carbon\Carbon::parse($result->created_at)->format('d-m-Y'); !!}
                                                </td>
                                                <td><a href="{{route('comment.show',$result->id)}}"> View Reply </a></td>
                                                <td> 
                                                    {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('comment.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                    {!! Form::close() !!} 
                                                </td> 
                                            </tr>
                                            @endif
                                           @endforeach 
                                        </tbody>
                                    </table>
                                    Showing {{($comments->currentpage()-1)*$comments->perpage()+1}} to {{$comments->currentpage()*$comments->perpage()}}
                                    of  {{$comments->total()}} entries
                                    
                                     <div class="center" align="center">  {!! $comments->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
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
       