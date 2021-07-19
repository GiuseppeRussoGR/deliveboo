@extends('layouts.app')
@section('header_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.js"></script>
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
    <nav class="row">
        <div class="logo col-3">
            <h5>Delive<span>Boo</span></h5>
        </div>
        <div class="col-9">
            <div class="login">
                <a class="float-right" href="{{ route('register') }}">
                    <span class="subtext">
                        Sei un ristoratore? Collabora con noi.
                    </span>
                    <i class="fas fa-user-circle icon"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- Fine Navigator -->

    <!-- Inizio Jumbotron -->
    <div class="my-jumbotron row" :class="{hide : categoryChosen}">
        <div class="col-7 jumbotron-text">
            <h2>Ordina cibo della tua zona con l'app</h2>

            <div class="subtitle">
                Scegli una delle categorie e visualizza subito i menù di tutti i ristoranti disponibili
            </div>
        </div>
           
        <div class="col-5 banner-image">
            <img src="https://st.depositphotos.com/1008939/1376/i/950/depositphotos_13766635-stock-photo-eating-pizza.jpg"
                alt="">
        </div>
            
    </div>
    <!-- Fine Jumbotron -->

    <!-- Inizio Tipologie -->
    <div class="types-section row" :class="{hide : restaurantChosen}">
        <h6 class="col-12">
            Esplora le Tipologie
        </h6>

        <div class="container">
            <div class="type-cards">
                <div class="" v-for="type in types">
                    <div class="type-card" @click='getApi("api/restaurants/", "restaurants", type.id); categoryChosen = true'>
                        <div class="img-container">
                            <i class="fas fa-pizza-slice"></i>
                        </div>
                        <div class="card-title">
                            @{{type.name}}
                        </div>
                        <div class="card-icon">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fine Tipologie -->

    <!-- Inizio Ristoranti -->
    <div class="restaurants-container row" :class="[{show : categoryChosen}, {hide : restaurantChosen}]">
        <div class="col-6" v-for='(restaurant, index) in restaurants'> 
            <div class="restaurant-card" 
                @click="getApi('api/dishes/','dishes',restaurant.id); restaurantChosen = true; chosenRestaurantIndex = index">
                <div class="restaurant-img">
                    <img :src="'storage/' + restaurant.img_path" alt="#">
                </div>

                <div class="restaurant-infos">
                    <div class="card-title">
                        @{{restaurant.name}}
                    </div>
                    <div class="restaurant-location">
                        <div class="restaurant-address">
                            <i class="fas fa-map-marker-alt"></i>
                            @{{restaurant.address}}
                        </div>
                        <div class="restaurant-city">
                            @{{restaurant.city}}
                        </div>
                    </div>
                    <div class="restaurant-rate subtext">
                        <i class="fas fa-star"></i>
                        Molto Buono
                        <span>(88)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fine Ristoranti -->

    <div v-if="restaurantChosen" class="single-restaurant-page">

        <!-- Inizio Singolo Ristorante -->
        <div class="single-restaurant row">
            <div class="img-container col-6">
                <img :src="'storage/' + restaurants[chosenRestaurantIndex].img_path" alt="">
            </div>

            <div class="single-restaurant-info col-6">
                        
                <h5>@{{restaurants[chosenRestaurantIndex].name}}</h5>
                    

                <div class="restaurant-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="card-title">
                        @{{restaurants[chosenRestaurantIndex].address}}, @{{restaurants[chosenRestaurantIndex].city}}
                    </span>
                </div>

                <div class="restaurant-rate">
                    <i class="fas fa-star"></i>
                    Molto Buono
                    <span>(88)</span>
                </div>

                        <!-- <div class="restaurant-category">
                            <span>Categoria:</span>
                        </div> -->

            </div>
        </div>
        <!-- Fine Singolo Ristorante -->

        <!-- Inizio Dishes -->
        <div class="dishes row">

            <div :class="openBasket ? 'col-4' : 'col-3'" v-for="(dish, index) in dishes">
                <div class="dish-card" :class="{'cart-open' : openBasket}">
                    <img :src="'storage/' + dish.img_path" :alt="dish.name">
                    <div class="dish-content">
                        <span class="dish-name card-title">
                            @{{ dish.name }}
                        </span>
                        <span class="dish-description">
                            @{{ dish.description }}
                        </span>
                        <div class="dish-controls">
                            <span class="price">@{{ dish.price }} €</span>
                            <!-- Ricorda di settare il più e il meno -->
                            <div class="number-input">
                                <button @click="setQuantity($('#quantity-'+ index ), '-')"></button>
                                <input min="1" :id="'quantity-' + index" type="number" name="quantita" value="1" class="quantity">
                                <button @click="setQuantity($('#quantity-'+ index ), '+')" class="plus"></button> 
                            </div>
                            <div class="cart-button" @click="insertBasket(index,$('#quantity-'+ index ).val()); openBasket = true">
                                <i class="fas fa-shopping-cart"></i>
                                <div class="plus-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Fine Dishes -->
    </div>
@endsection

@section('side-window')
    <!-- Inizio Carrello -->
    <div class="cart">
        <div class="title">
            <div class="subtitle">
                Carrello
            </div>
            <div class="closing-icon">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="cart-subtitle">
            Dati di consegna
        </div>
        <form class="my_form" method="post" action="#" @submit.prevent="setOrder()">
            <div class="form-group">
                <label for="client_name">Nome</label>
                <input type="text" class="form-control" @change="requireFormData()" id="client_name"
                       v-model="order.client_name" required name="client_name"
                       placeholder="Mario Rossi">
            </div>
            <div class="form-group">
                <label for="client_number">Recapito Telefonico</label>
                <input type="number" class="form-control" id="client_number" @change="requireFormData()"
                       v-model="order.client_number" required name="client_number"
                       placeholder="es. 3249065865">
            </div>
            <div class="form-group">
                <label for="client_address">Address</label>
                <input type="text" class="form-control" id="client_address" @change="requireFormData()"
                       v-model="order.client_address" required name="client_address"
                       placeholder="via Giuseppe Garibaldi">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="client_civic_number">Civico</label>
                    <input type="number" class="form-control" v-model="order.client_civic_number" id="client_civic_number" @change="requireFormData()"
                           required
                           name="civic_number"
                           placeholder="31">
                </div>
                <div class="form-group col-md-6">
                    <label for="client_city_cap">CAP</label>
                    <input type="text" class="form-control"  v-model="order.client_city_cap" id="client_city_cap" @change="requireFormData()" required
                           name="city_cap" placeholder="20123">
                </div>
            </div>
            <div class="form-group">
                <label for="client_city">Città</label>
                <input type="text" class="form-control"  v-model="order.client_city" id="client_city" required @change="requireFormData()"
                       name="client_city"
                       placeholder="Milano">
            </div>
        </form>

        <div class="cart-subtitle">
            Ordine
        </div>

        <div class="order-items">
            <ul v-if="order.dishes.length > 0">
                <li v-for="dish in  order.dishes">
                    <span class="dish-name">@{{ dish.nome }} <span class="dish-quantity">(x@{{dish.quantita}})</span></span>
                    <span class="dish-total-price">@{{ dish.totale_singolo }} € <i class="fas fa-times"></i></span>
                </li>
            </ul>
            <ul v-else>
                <li>
                    Empty
                </li>
            </ul>
        </div>

        <div class="bottom-info">
            <div class="order-total">
                <span class="total-order">
                    Totale Ordine:
                </span>
                <span>
                @{{ order.total_price }} €
                </span>
            </div>
            <button class="btn-checkout" data-toggle="modal" data-target="#payment">
                    CHECKOUT
            </button>
        </div>

        <!-- Inizio Modale -->
        <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pagamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="dropin-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="button_payment" @click="makePayment()">Paga</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fine Modale -->
    </div>
    <!-- Fine Carrello -->
@endsection

@section('footer_script')
    <script src="{{ asset('js/vue.js') }}" charset="utf-8"></script>
@endsection
