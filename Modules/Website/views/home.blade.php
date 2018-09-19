
@extends('website::layouts.master')
    @section('title', 'HOME')
        
    @section('header')
    <h1>Home</h1>
    @stop

    @section('content') 

        @include('website::partials.menu')
        <!-- Left side column. contains the logo and sidebar -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">   
            @include('website::partials.side-category-tab')

            
            <!-- ================================== TOP NAVIGATION : END ================================== -->
            <div class="app-img outer-bottom-xs"><img alt="app" src="{{ asset('public/enduser/assets/images/app-img.jpg')}}" /></div>
        </div>
            @include('website::partials.home-slider')
        </div>

        <div class="row"> 
            @include('website::partials.home-left-deals-offer-sidebar')
            @include('website::partials.home-right-product-panel')

        </div>
 
    @stop