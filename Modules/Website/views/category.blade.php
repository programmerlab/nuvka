
@extends('website::layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 
         <div class="row">
            @include('website::partials.menu')
            @include('website::partials.breadcrumb')
         
            
               @include('website::partials.product-sidebar') 
               
                @include('website::partials.product') 
            </div> 
    @stop
 