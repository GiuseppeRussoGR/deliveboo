@extends('layouts.app')
@section('header_script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@endsection
@section('app_style', 'user detail')

@section('app-vertical-class', 'col-1')

@section('app-content-class')
    openBasket ? 'col-7 col-md-8' : 'col-10 col-md-11'
@endsection

@section('vertical-nav')
    <!-- Inizio Menu Verticale -->
    <div class="icons-container">
        <a href="{{route('admin.user.index')}}"><i class="fas fa-home icon home-icon"></i></a>
        <a href="#"><i class="fas fa-info-circle icon active"></i></a>
        <a href="{{route('admin.user.create')}}"><i class="fas fa-plus icon"></i></a>
        <a href="{{route('admin.restaurant-listOrder')}}"><i class="fas fa-shopping-cart icon" ></i></a>
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
            <h6>Dettaglio del piatto</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <!-- here -->
            <div class="mx-auto col-md-10">
                <div class="card">
                    <div class="card-image">
                        <img class="card-img-top img-fluid" src="{{ asset('storage/' . $dish->img_path) }}"
                             alt="{{ $dish->name}}">
                    </div>
                    <div class="card-body mx-auto">
                        <h5 class="card-title">{{ $dish->name}}</h5>
                        <p class="card-text">{{ $dish->description}}</p>
                        <form action="{{ route('admin.user.destroy', ['user' => $dish->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger bottom" value="Elimina">
                        </form>
                        <p class="card-text">
                            <small class="text-muted">prezzo: {{ $dish->price}}€
                            </small>
                        </p>
                    </div>
                </div>
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
