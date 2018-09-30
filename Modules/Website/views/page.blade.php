
@extends('website::layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            @include('website::partials.menu')
            <div class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <ul class="list-inline list-unstyled">
                            <li><a href="home.html">Home</a></li>
                            <li class="active">{{ ucfirst($page_title) ?? ''}}</li>
                        </ul>
                    </div><!-- /.breadcrumb-inner -->
                </div><!-- /.container -->
            </div>
        <div class="checkout-box faq-page">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-title">{{$page_title?? ''}}</h2>
                    <div class="panel-group checkout-steps" id="accordion">
           
                <!-- panel-heading -->

                        <div id="collapseOne" class="panel-collapse collapse in">

                            <!-- panel-body  -->
                            <div class="panel-body">
                               {!! $html??'' !!}        
                            </div>
                            @if(!empty($page->images))
                            <div class="panel-body">
                               <img src="{{url('storage/pages/'.$page->images)}}" width="100%">        
                            </div>
                            @endif
                            <!-- panel-body  -->

                        </div><!-- row -->
                    </div>
<!-- checkout-step-01  -->
                          
 

                        
                </div><!-- /.checkout-steps -->
                </div>
        </div><!-- /.row -->
    </div><!-- /.checkout-box -->
@stop