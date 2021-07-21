@extends('layouts.app')
@section('header_script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('app_style', 'user')
@section('content')
    <div id="canvas_container">
        <canvas id="myChart"></canvas>
    </div>
    <button onclick=" window.resetCanvas(true)">Cambia</button>
@endsection
@section('footer_script')
    <script>
        let statistics = [];
    </script>
    <script src="{{ asset('js/statistic.js') }}" charset="utf-8"></script>
    @foreach($array_statistic as $element)
        <script>
            statistics.push({
                id_piatto: '{{$element->dish_id}}',
                id_ordine: '{{$element->order_id}}',
                nome_piatto: '{{$element->name_dish}}',
                prezzo_totale: '{{$element->total_price}}',
                inserito: '{{$element->created_at}}'
            });
        </script>
    @endforeach
@endsection
