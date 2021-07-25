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
    <div class="row" style="{{count($array_list) > 16 ? 'height: 100%;' : ''}} overflow: auto">
        @foreach($array_list as $element)
            <div class="col-12 col-md-3" style="padding-bottom: 20px">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Ordine fatto il {{$element->created_at}}</h6>
                        <p class="card-text">Totale: {{$element->total_price}}€</p>
                    </div>
                </div>
            </div>
        @endforeach
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
