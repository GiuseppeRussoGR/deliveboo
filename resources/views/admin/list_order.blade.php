@extends('layouts.app')
@section('header_script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@endsection
@section('app_style', 'user list')

@section('app-vertical-class', 'col-1')

@section('app-content-class')
    openBasket ? 'col-7 col-md-8' : 'col-10 col-md-11'
@endsection

@section('vertical-nav')
    <!-- Inizio Menu Verticale -->
    <div class="icons-container">
        <a href="{{route('admin.user.index')}}"><i class="fas fa-home icon home-icon"></i></a>
        <a href="{{route('admin.user.create')}}"><i class="fas fa-plus icon"></i></a>
        <a href="{{route('admin.restaurant-listOrder')}}"><i class="fas fa-shopping-cart icon active"></i></a>
        <a href="{{route('admin.restaurant-statistics', ['id' => Illuminate\Support\Facades\Auth::user()->id])}}"><i
                class="fas fa-chart-line icon"></i></a>
    </div>
    <!-- Fine Menu Verticale -->
@endsection

@section('content')
    <!-- Inizio Navigator -->
    <nav class="row">
        <div class="logo col-3">
            <h5>Delive<span>Boo</span></h5>
        </div>
        <div class="col-9">
            <div class="login">
                <a class="float-right" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span class="subtext">
                        Logout
                    </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-12">
            <h6>Elenco ordini ricevuti</h6>
        </div>
    </div>
    <div class="row" style="height: calc(100vh - 300px); overflow: hidden">
        {{--        {{count($array_list) > 16 ? 'height: 100%;' : ''}}--}}
        <div class="col-12 table-responsive" style="height: 100%; overflow: auto">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Ordine del</th>
                    <th scope="col">Nome e Cognome</th>
                    <th scope="col">Indirizzo di spedizione</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Codice transazione</th>
                    <th scope="col">Stato pagamento</th>
                    <th scope="col">Totale ordine</th>
                </tr>
                </thead>
                <tbody>
                @foreach($array_list as $key => $element)
                    @php
                        $list_dish = [];
                    @endphp
                    @foreach($element->dishes as $dish)
                        @php
                            $list_dish [$dish->name] = $dish->pivot->quantita;
                        @endphp
                    @endforeach
                    <tr style="cursor: pointer"
                        data-toggle="collapse" data-target="#list_order_{{$key}}"
                        class=" {{$element->payment_status === 'accepted' ? 'table-success' : ($element->payment_status === 'rejected' ? 'table-danger' : 'table-info') }}">
                        <th scope="row">{{$element->created_at}}</th>
                        <td>{{$element->client_name}}</td>
                        <td>{{$element->client_address}}</td>
                        <td>{{$element->client_number}}</td>
                        <td>{{$element->client_code}}</td>
                        <td>{{$element->payment_status}}</td>
                        <td>{{$element->total_price}} €</td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div class="collapse" id="list_order_{{$key}}">
                                <div class="card card-body">
                                    <ul class="d-flex justify-content-around pl-0">
                                        @foreach($list_dish as $keyDish => $dishQuantity)
                                            <li>{{$keyDish}}<span> x</span>{{$dishQuantity}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        const user = new Vue({
            el: '#root',
            data: {
                openBasket: false
            }
        })
    </script>
@endsection
