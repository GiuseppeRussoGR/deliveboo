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
    <div class="title">
        <div class="subtitle">
            Carrello
        </div>
        <button class="btn btn-primary">
            Ciao
        </button>
    </div>

    <div class="cart-subtitle">
        Dati di consegna
    </div>

    <form class="my_form" action="">

        <div class="form-group">
            <label for="client_name">Nome</label>
            <input type="text" class="form-control" id="client_name" placeholder="Mario Rossi">
        </div>
        <div class="form-group">
            <label for="client_number">Recapito Telefonico</label>
            <input type="number" class="form-control" id="client_number" placeholder="es. 3249065865">
        </div>
    
        <div class="form-group">
            <label for="client_address">Address</label>
            <input type="text" class="form-control" id="client_address" placeholder="via Giuseppe Garibaldi">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="civic_number">Civico</label>
                <input type="number" class="form-control" id="civic_number" placeholder="31">
            </div>
            <div class="form-group col-md-6">
                <label for="city_cap">CAP</label>
                <input type="text" class="form-control" id="city_cap" placeholder="20123">
            </div>
        </div>

        <div class="form-group">
            <label for="client_city">Città</label>
            <input type="text" class="form-control" id="client_city" placeholder="Milano">
        </div>

    </form>
    
    <div class="cart-subtitle">
        Ordine
    </div>

    <div class="order-items">
        <ul>
            <li>
                <img src="https://static.gamberorosso.it/da-zero.jpg" alt="">
                <span>Pizza Margherita</span>
                <span>5€</span>
            </li>
            <li>
                <img src="https://static.gamberorosso.it/da-zero.jpg" alt="">
                <span>Pizza Margherita</span>
                <span>5€</span>
            </li>
            <li>
                <img src="https://static.gamberorosso.it/da-zero.jpg" alt="">
                <span>Pizza Margherita</span>
                <span>5€</span>
            </li>
        </ul>
    </div>

    <div class="order-total">
        <span class="total-order">
            Totale Ordine:
        </span>
        <span>
            15€ 
        </span>
    </div>


</div>
<!-- Fine Carrello -->
@endsection

@section('footer_script')
    <script src="{{ asset('js/vue.js') }}" charset="utf-8"></script>
@endsection
