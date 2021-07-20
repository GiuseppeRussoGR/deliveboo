@extends('layouts.app')
@section('app_style', 'user')
@section('content')
    @foreach($array_statistic as $element)
        {{$element->dish_id}}
        {{$element->order_id}}
        {{$element->name_dish}}
        {{$element->total_price}}
        {{$element->created_at}}
    @endforeach
@endsection
