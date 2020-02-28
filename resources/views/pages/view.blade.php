<?php
//$user->skills;
//$iam = Auth::user()->name == $user->name;
?>
@extends('layouts.innerfree')

@section('template_title')
{{$page->title}}
@endsection


@section('innercontent')


<div class="p-table p-table_bg">
    <div class="p-table__header p-table__header_pd type-h2 c-a hidden-tablet">{{$page->title}}</div>
    <div class="p-table__content p-table__content_pd container-mobile">
        {{$page->content}}
    </div>
</div>

@endsection

@section('footer_scripts')

@endsection
