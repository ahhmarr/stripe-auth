@extends('master')
@section('content')
    @if($flag)
        success
    @else
        error
    @endif
@stop