@extends('layouts.app')
@section('header_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@endsection

@section('app_style', 'client')

@section('vertical-nav')
<!-- Inizio Menu Verticale -->
<div class="icons-container">
    <i class="fas fa-home icon active"></i>
    <i class="fas fa-search icon"></i>
    <i class="fas fa-utensils icon"></i>
    <i class="fas fa-wallet icon"></i>
    <i class="far fa-heart icon"></i>
</div>
<!-- Fine Menu Verticale -->
@endsection


@section('content')
<!-- {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}} -->


<!-- Inizio Navigator -->
<nav>
    <div class="logo">
         <h5>Delive<span>Boo</span></h5>
    </div>
    <div class="login">
        <a href="">
        <span class="subtext">
            Sei un ristoratore? Registrata qui la tua attività.
        </span>
        <i class="fas fa-user-circle icon"></i>
        </a>
    </div>
</nav>
<!-- Fine Navigator -->

<!-- Inizio Jumbotron -->
<div class="my_jumbotron">

</div>
<!-- Fine Jumbotron -->

<!-- Inizio Categorie -->
<div class="categories">

</div>
<!-- Fine Categorie -->

<!-- Inizio Ristoranti -->
<div class="restaurants">

    <div class="restaurant">
        <div class="restaurant-img">
            <img src="" alt="#">
        </div>

        <div class="restaurant-infos">
            <h3>Pizzeria Sangiovanni</h3>
            <span>Magenta, Milano</span>
            <span>Molto Buono</span>
        </div>
    </div>

</div>
<!-- Fine Ristoranti -->

<!-- Inizio Singolo Ristorante -->
<div class="restaurants">

</div>
<!-- Fine Singolo Ristorante -->

<!-- Inizio Menu -->
<div class="menu">

</div>
<!-- Fine Menu -->


    <!-- <ul>
        <li v-for="type in types" @click='getRestaurants(type.id)'>@{{type.name}}</li>
    </ul>
    <div v-if='restaurants.length > 0'>
        <ul>
            <li v-for='restaurant in restaurants'>
                <ul>
                    <li><img :src="'storage/' + restaurant.img_path" alt="Restaurant Cover"></li>
                    <li @click='getDishes(restaurant.id)'>@{{restaurant.company_name}}</li>
                </ul>
            </li>
        </ul>
        <div v-if='restaurants.length > 0'>
            <ul>
                <li v-for='restaurant in restaurants'>
                    <ul>
                        <li><img :src="'storage/' + restaurant.img_path" alt="Restaurant Cover"></li>
                        <li @click='getDishes(restaurant.id)'>@{{restaurant.company_name}}</li>
                    </ul>
                </li>
            </ul>
        </div>

    <div v-if='dishes.length > 0'>
        <ul>
            <li v-for='dish in dishes'>
                <ul>
                    <li><img :src="'storage/' + dish.img_path" alt="Restaurant Cover"></li>
                    <li>@{{dish.name}}</li>
                    <li>@{{dish.description}}</li>
                    <li>@{{dish.price}}</li>
                </ul>
            </li>
        </ul>
    </div> -->

@endsection

@section('side-window')
<!-- Inizio Carrello -->
<div class="cart">

</div>
<!-- Fine Carrello -->
@endsection

@section('footer_script')
    <script src="{{ asset('js/vue.js') }}" charset="utf-8"></script>
@endsection
