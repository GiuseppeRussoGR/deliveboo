@extends('layouts.app')
@section('header_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
@endsection
@section('app_style', 'user statistics')

@section('app-vertical-class', 'col-1')

@section('app-content-class')
    openBasket ? 'col-7 col-md-8' : 'col-10 col-md-11'
@endsection

@section('vertical-nav')
    <!-- Inizio Menu Verticale -->
    <div class="icons-container">
        <a href="{{route('admin.user.index')}}"><i class="fas fa-home icon home-icon"></i></a>
        <a href="{{route('admin.user.create')}}"><i class="fas fa-plus icon"></i></a>
        <a href="{{route('admin.restaurant-listOrder')}}"><i class="fas fa-shopping-cart icon"></i></a>
        <a href="{{route('admin.restaurant-statistics', ['id' => Illuminate\Support\Facades\Auth::user()->id])}}"><i
                class="fas fa-chart-line icon active"></i></a>
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
            <div id="statistics">
                <div class="lds-roller">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <month-chart v-if="status" :id="{{$id}}"></month-chart>
                <year-chart v-else :id="{{$id}}"></year-chart>
                <button class="btn btn-primary" id="change_visual" @click="status = !status">Cambia visuale</button>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script src="{{ asset('js/statistic.js') }}" charset="utf-8"></script>
    <script>
        document.getElementById('change_visual').addEventListener('click', () => {
            const style = document.getElementsByClassName('lds-roller')
            for (let i = 0; i < style.length; i++) {
                style[i].style.display = 'block';
            }
        })
    </script>
@endsection
