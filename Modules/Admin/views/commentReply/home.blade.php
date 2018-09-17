
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
                                        <span class="caption-subject font-red sbold uppercase">{{ $heading }}S</span>
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
                                         
                                         <div class="col-md-2 pull-right">
                                             <a href="{{ URL::previous() }}">   <input type="button" value="Back" class="btn btn-primary form-control"> </a>
                                        </div>
                                       
                                        </div>
                                </div>

                                   
                                <div class="portlet-body">
                                    <table class="table table-striped table-hover table-bordered" id="">
                                        <thead>
                                         <tr>
                                                <td colspan="5"> <h4>Task Title : <b>{{ $comments[0]->taskDetail->title or 'NA'}} </b> </h4></td>
                                           </tr>
                                            <tr>
                                             <th> Sno. </th>
                                                 
                                                <th> Comment By </th>  
                                                <th> Comment </th> 
                                                <th>Comment Date</th> 
                                                
                                                 <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if(isset($comments) && count($comments)==0 )
                                           <p style="color: red"> No comments found! </p>
                                           
                                         @endif
                                        @foreach($comments as $key => $result)  
                                      
                                            <tr>
                                             <td>{{ ++$key }}</td> 
                                               
                                                <td> 

                                                @if(isset($result->userDetail->first_name))
                                                    {{ $result->userDetail->first_name.' '. $result->userDetail->last_name }}
                                                @endif

                                               </td>
                                                <td>{{ $result->commentDescription}}</td>
                                                <td> 

                                                    {!! Carbon\Carbon::parse($result->created_at)->format('d-m-Y'); !!}

                                                </td>
                                                
                                                <td> 
                                                    {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('comment.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                    {!! Form::close() !!} 
                                                </td> 
                                            </tr>
                                             
                                           @endforeach 
                                        </tbody>
                                    </table>
                                    
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
        