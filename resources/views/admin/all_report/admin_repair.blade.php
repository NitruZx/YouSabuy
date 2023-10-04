@extends('admin.layout')

@section('header')
<style>
    [x-cloak] {
        display: none !important;
    }
  </style>
  
  @filamentStyles
@endsection

@section('content')
@livewire('admin-repair')
@filamentScripts
@endsection