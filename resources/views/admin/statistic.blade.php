@extends('layouts.app')
@section('app_style', 'user')
@section('content')
    <h1>Tutti gli ordini</h1>
    @foreach($array_statistic as $element)
        <ul>
            <li>id piatto: {{$element->dish_id}}</li>
            <li>id ordine: {{$element->order_id}}</li>
            <li>Nome piatto: {{$element->name_dish}}</li>
            <li>Prezzo totale ordine: {{$element->total_price}}</li>
            <li>inserito il: {{$element->created_at}}</li>
        </ul>
    @endforeach
@endsection
