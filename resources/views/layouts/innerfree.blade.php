@extends('layouts.zigrat2')

@section('template_title')
{{ Auth::user()->name }}'s' Homepage
@endsection


@section('content')

<div class="total-indent p-page">
   
    <div class="p-page-col">
        
        <div class="p-page-col__menu">
            <div class="main-brief">                
                @include('partials.leftmenu', ['free' => true])             
            </div>
        </div>
        <div class="p-page-col__main">
            @yield('innercontent')
        </div>
    </div>
</div>

@endsection
