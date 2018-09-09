@extends('website::layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 
            <div class="row single-product">
                @include('website::partials.menu')
                 @include('website::partials.breadcrumb')
         
                @include('website::partials.product_detail_sidebar')
                @include('website::partials.product_details')
            </div>
        @stop