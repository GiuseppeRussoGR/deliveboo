@extends('layouts.app')
@section('header_script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@endsection
@section('app_style', 'user')

@section('vertical-nav')
    <!-- Inizio Menu Verticale -->
    <div class="icons-container">
        <a href="{{route('admin.user.index')}}"><i class="fas fa-home icon home-icon active"></i></a>
        <a href="{{route('admin.user.create')}}"><i class="fas fa-plus icon"></i></a>
        <a href="{{route('admin.restaurant-listOrder')}}"><i class="fas fa-shopping-cart icon" ></i></a>
        <a href="{{route('admin.restaurant-statistics', ['id' => Illuminate\Support\Facades\Auth::user()->id])}}"><i class="fas fa-chart-line icon"></i></a>
    </div>
    <!-- Fine Menu Verticale -->
@endsection
@section('app-content-class')
    openBasket ? 'col-7 col-md-8' : 'col-10 col-md-11'
@endsection
@section('content')
    <!-- Inizio Navigator -->
    <nav class="row">
        <div class="logo col-3">
            <h5>Delive<span>Boo</span></h5>
        </div>
        <div class="col-9">
            <div class="login">
                <a class="btn float-right logout-button" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span class="subtext">
                        Logout
                    </span>
                    <i class="fas fa-user-circle icon"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </nav>
    <div class="row">
        <div class="col-12">
            <h3>Elenco piatti</h3>
        </div>
    </div>
    <div class="dishes-container row">
        @foreach($dishes as $dish)
            <div class="col-12 col-md-6">
                <div class="dishes-card">
                    <div class="dish-img">
                        <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name}}">
                    </div>
                    <div class="dish-infos">
                        <div class="card-title">
                            {{$dish->name}}
                        </div>
                        <div class="card-description">
                            {{$dish->description}}
                        </div>
                        <div class="card-price">
                            {{$dish->price}}€
                        </div>
                        <div class="button_user">
                            <a href="{{ route('admin.user.edit', [ 'user' => $dish->id ])}}" class="btn btn-success"
                               style="margin-right: 5px;">Modifica</a>
                            <a href="{{ route('admin.user.show', [ 'user' => $dish->id ])}}" class="btn btn-primary"
                               style="margin-left: 5px;">Dettagli</a>
                        </div>
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
