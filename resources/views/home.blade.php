@extends('layouts.app')
@section('header_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.js"></script>
@endsection

@section('app_style', 'client')
@section('app-vertical-class', 'col-1')

@section('app-content-class')
    openBasket ? 'col-7 col-md-8' : 'col-11'
@endsection

@section('app-side-class')
    openBasket ? 'col-4 col-md-3' : ''
@endsection

@section('vertical-nav')
    <!-- Inizio Menu Verticale -->
    <div class="icons-container">
        <i class="fas fa-home icon home-icon" :class="stage === 0 ? 'active' : '' "
           @click="categoryChosen = false; restaurantChosen = false; stage = 0;openBasket = false; card = false;"></i>
        <i class="fas fa-search icon" :class="stage === 1 ? 'active' : '' "
           @click="restaurantChosen = false; stage > 1 ? stage = 1 : '' "></i>
        <i class="fas fa-utensils icon" :class="stage === 2 ? 'active' : '' "
           @click="stage === 3 ? openBasket = false : ''; stage === 3 ? stage = 2 : '' "></i>
        <i class="fas fa-wallet icon" :class="stage === 3 ? 'active' : '' "
           @click="stage > 1 ? openBasket = true : ''; stage > 1 ? stage = 3 : '' "></i>
        <i class="far fa-heart icon" :class="stage === 4 ? 'active' : '' "></i>
    </div>
    <!-- Fine Menu Verticale -->
@endsection




@section('content')
    <!-- The Modal -->
    <div class="modal fade" id="error_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div :class="'modal-header alert-'+ notify.style">
                    <h4 class="modal-title">Errore</h4>
                    <button type="button" class="close" data-dismiss="modal" @click="notify = {}">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <span v-if="typeof notify.message === 'string'">
                     @{{ notify.message }}<br>
                    </span>
                    <span v-else v-for="message in notify.message">
                     @{{message}}<br>
                        </span>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="notify = {}">Chiudi
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Inizio Navigator -->
    <nav class="row">
        <div class="logo col-3">
            <h5>Delive<span>Boo</span></h5>
        </div>
        <div class="col-9">
            <div class="login">
                <div class="burger-content">
                    @guest
                        <a class="btn float-right register-button" href="{{ route('register') }}">
                        <span class="subtext">
                            Sei un ristoratore? Collabora con noi
                        </span>
                        </a>
                        <a class="btn float-right login-button" href="{{ route('login') }}">
                        <span class="subtext">
                            Login
                        </span>
                        </a>
                    @else
                        <a class="btn float-right" href="{{ route('admin.user.index')}}">
                            Gestisci i tuoi piatti
                        </a>
                        <a class="btn float-right logout-button" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="subtext">
                            Logout
                        </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </div>
                <button v-if="!openBasket" class="btn burger" type="button" @click="openBasket = !openBasket">
                    <i class="fas fa-shopping-basket icon"></i>
                    <span class="items-in-cart" v-if="order.dishes.length > 0">
                        @{{ quantityInCart }}
                    </span>
                </button>
                <button class="btn burger" type="button" @click="showMenu">
                    <i class="fas fa-user-circle icon"></i>
                </button>

            </div>
        </div>
    </nav>
    <!-- Fine Navigator -->

    <!-- Inizio Jumbotron -->
    <div class="my-jumbotron row" :class="{hide : categoryChosen, reduce: allTypesShown}">

        <div class="col-lg-6 col-md-12 col-sm-12 jumbotron-text">
            <h2>Ordina dai migliori ristoranti della tua zona</h2>

            <div class="subtitle">
                Scegli una delle categorie e visualizza subito i menù dei tuoi ristoranti preferiti
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 banner-image">
            <img src="storage/jumbo/jumbo.png" alt="jumbotron-image">
        </div>

    </div>
    <!-- Fine Jumbotron -->

    <!-- Inizio Tipologie -->
    <div class="types-section row" :class="{hide : restaurantChosen}">
        <div class="types-container-title col-12">
            <h6>
                Esplora le Tipologie
            </h6>
            <span @click="showAllTypes()">
                @{{showHideTypesButton}}
            </span>
        </div>


        <div class="container">
            <div class="type-cards" :class="{enlarge : allTypesShown}">
                <div class="col-6 col-md-4 col-lg-3 col-xl-2" v-for="(type,index) in types">
                    <div class="type-card" :class="{active : card === index}"
                         @click='getApi("api/restaurants/", "restaurants", type.id); card = index; categoryChosen = true; stage = 1'>
                        <div class="img-container">
                            <img :src="'storage/'+ type.img_path" alt=""/>
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

    <div v-if="categoryChosen && !restaurantChosen">
        <div class="card-title type-indicator">
            I nostri risultati per la Tipologia: @{{ types[card].name }}
        </div>
    </div>

    <!-- Inizio Ristoranti -->
    <div v-if="restaurants.length > 0 && categoryChosen" class="restaurants-container row"
         :class="[{show : categoryChosen}, {hide : restaurantChosen}, {reduce: allTypesShown}]">
        <div :class="openBasket ? 'col-12 col-xl-6' : 'col-12 col-xl-6'"
             v-for='(restaurant, index) in restaurants'>
            <div class="restaurant-card"
                 @click="getApi('api/dishes/','dishes',restaurant.id, restaurant.type_id);restaurantChosen = true; chosenRestaurantIndex = index; restaurant_id = restaurant.id; stage = 2">
                <div class="restaurant-img">
                    <img :src="'storage/' + restaurant.img_path" :alt="restaurant.name">
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
                <div v-if="order.dishes.length > 0 && restaurant.id === order.dishes[0].ristorante"
                     class="if-basket"><i class="fas fa-cart-arrow-down"></i></div>
            </div>
        </div>
    </div>
    <!-- Fine Ristoranti -->

    <div v-else-if="categoryChosen" class="restaurants-container row"
         :class="[{show : categoryChosen}, {hide : restaurantChosen}]">
        Al momento non ci sono elementi in questa tipologia
    </div>

    <div v-if="restaurantChosen" class="single-restaurant-page">

        <!-- Inizio Singolo Ristorante -->
        <div class="single-restaurant row">
            <div class="img-container col-6">
                <img :src="'storage/' + restaurants[chosenRestaurantIndex].img_path"
                     :alt="restaurants[chosenRestaurantIndex].name">
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
            </div>
        </div>
        <!-- Fine Singolo Ristorante -->

        <!-- Inizio Dishes -->
        <div class="dishes row">

            <div :class="openBasket ? 'col-12 col-md-6 col-xl-4' : 'col-6 col-lg-4 col-xl-3'"
                 v-for="(dish, index) in dishes">
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
                            <div class="number-input">
                                <button @click="setQuantity($('#quantity-'+ index ), '-')"></button>
                                <input disabled readonly min="1" :id="'quantity-' + index" type="number" name="quantita"
                                       value="1"
                                       class="quantity">
                                <button @click="setQuantity($('#quantity-'+ index ), '+')" class="plus"></button>
                            </div>
                            <div class="cart-button"
                                 @click="insertBasket(index,$('#quantity-'+ index ).val()); openBasket = true; stage = 3">
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
                <i class="fas fa-times" @click="openBasket = false; stage === 3 ? stage = 2 : stage"></i>
            </div>
        </div>
        <div class="cart-subtitle">
            Dati di consegna
        </div>
        <form class="my_form" action="#" id="my_form">
            <div class="form-group">
                <label for="client_name">Nome</label>
                <input type="text" class="form-control" id="client_name"
                       v-model="order.client_name" required name="client_name"
                       placeholder="Mario Rossi">
            </div>
            <div class="form-group">
                <label for="client_number">Recapito Telefonico</label>
                <input type="phone" class="form-control" id="client_number"
                       v-model="order.client_number" required name="client_number"
                       placeholder="es. 3249065865">
            </div>
            <div class="form-group">
                <label for="client_address">Indirizzo</label>
                <input type="text" class="form-control" id="client_address"
                       v-model="order.client_address" required name="client_address"
                       placeholder="via Giuseppe Garibaldi">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="client_civic_number">Civico</label>
                    <input type="number" class="form-control" v-model="order.client_civic_number"
                           id="client_civic_number"
                           required
                           name="civic_number"
                           placeholder="31">
                </div>
                <div class="form-group col-md-6">
                    <label for="client_city_cap">CAP</label>
                    <input type="text" class="form-control" v-model="order.client_city_cap" id="client_city_cap"
                           required
                           name="city_cap" placeholder="20123">
                </div>
            </div>
            <div class="form-group">
                <label for="client_city">Città</label>
                <input type="text" class="form-control" v-model="order.client_city" id="client_city" required
                       name="client_city"
                       placeholder="Milano">
            </div>
        </form>

        <div class="cart-subtitle">
            Ordine
        </div>

        <div class="order-items">
            <ul v-if="order.dishes.length > 0">
                <li v-for="(dish,index) in  order.dishes">
                    <span class="dish-name">@{{ dish.nome }}</span>
                    <!-- Ricorda di settare il più e il meno -->
                    <div class="bottom-order-item">
                        <div class="number-input">
                            <button
                                @click="setQuantity($('#quantity-basket-'+ index ), '-'); dish.quantita = (dish.quantita - 1) >= 1 ? dish.quantita - 1 : dish.quantita; totalOrderRecalculated(index, true); setDataOrderCookie()"></button>
                            <input min="1" disabled readonly :id="'quantity-basket-' + index" type="number"
                                   name="quantita"
                                   v-model="dish.quantita" :value="dish.quantita"
                                   class="quantity">
                            <button
                                @click="setQuantity($('#quantity-basket-'+ index ), '+'); dish.quantita = dish.quantita + 1; totalOrderRecalculated(index, true)"
                                class="plus"></button>
                        </div>
                        <span class="dish-total-price">@{{ dish.totale_singolo }} € <i class="fas fa-times"
                                                                                       @click="removeOrder(index); totalOrderRecalculated('', false); setDataOrderCookie()"></i></span>
                    </div>
                </li>
            </ul>
            <ul v-else>
                <li class="empty-cart-msg">
                    Al momento il carrello è vuoto
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
            <button class="btn-checkout" @click="setOrder()">
                CHECKOUT
            </button>
        </div>

    </div>
    <!-- Fine Carrello -->
    <!-- Inizio Modale -->
    <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="payment"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            @click="teardownBraintree()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="dropin-container"></div>
                    <div id="message_payment"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="teardownBraintree()">
                        Chiudi
                    </button>
                    <button type="button" class="btn btn-primary" id="button_payment"
                            @click="makePayment(); stage=4">Paga
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fine Modale -->
@endsection

@section('footer_script')
    <script src="{{ asset('js/vue.js') }}" charset="utf-8"></script>
@endsection

