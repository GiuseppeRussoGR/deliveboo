<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resoconto Ordine</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(180deg, #76c4ff 0%, #24A1FF 75%, #43aeff 100%);
            font-family: 'Montserrat', sans-serif;
        }

        img {
            width: 100%;
        }

        ul {
            list-style-type: none;
        }

        .container {
            max-width: 80%;
            margin: 20px auto;
            background-color: white;
            overflow: hidden;
            border-radius: 15px;
        }

        .logo {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            padding: 20px 0;
        }

        .logo span {
            color: #FFA823;
        }

        .jumbo {
            background-color: #24A1FF;
            width: 100%;
            height: 200px;
            position: relative;
            color: white;
            text-align: center;
            line-height: 110px;
        }

        .jumbo::after {
            content: '';
            width: 0;
            height: 0;
            position: absolute;
            right: 0;
            bottom: 0;
            border-bottom: 90px solid white;
            border-left: 1500px solid transparent;
        }

        .container-2 {
            max-width: 90%;
            margin: auto;
        }

        .great {
            text-align: center;
            border-bottom: 1px solid grey;
            padding-bottom: 20px;
            margin-top: 20px;
        }

        .sender-receiver {
            padding: 20px 0;
        }

        .sender-receiver::after {
            content: '';
            display: table;
            clear: both;
        }

        .sender, .image, .receiver {
            float: left;
            width: 30%;
        }

        .sender, .receiver {
            font-size: 16px;
            line-height: 2;
        }

        .receiver {
            text-align: right;
        }

        .image {
            margin: 0 5%;
        }

        .list-order {
            padding: 20px 0;
        }

        .list-order li {
            padding-bottom: 15px;
        }

        .img, .detail {
            display: inline-block;
            vertical-align: middle;
        }

        .img {
            width: 90px;
        }

        .quantity {
            font-size: 11px;
            color: gray;
        }

        .total_single_price span {
            font-size: 13px;
        }

        .total {
            text-align: center;
            margin-bottom: 20px;
        }

        .tracking {
            margin: 40px 0;
            text-align: center;
        }

        .tracking h2 {
            margin-bottom: 10px;
        }

        .tracking button {
            background-color: #FFA823;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <h5>Delive<span>Boo</span></h5>
        </div>
        <div class="jumbo">
            @foreach($restaurants as $data)
                <h2>{{$data->company_name}} ha il tuo ordine!</h2>
            @endforeach
        </div>
    </header>
    <div class="container-2">
        <div class="great">
            <h3>Ottima scelta, {{$order->client_name}}</h3>
        </div>
        <div class="sender-receiver">
            <div class="sender">
                <h4>Ristorante</h4>
                <ul>
                    @foreach($restaurants as $data)
                        <li>{{$data->company_name}}</li>
                        <li>{{$data->address}}</li>
                        <li>{{$data->city}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="image">
                <img src="https://www.foodserviceweb.it/wp-content/uploads/sites/4/2020/05/food-delivery.jpg" alt="">
            </div>
            <div class="receiver">
                <h4>Destinatario</h4>
                <ul>
                    <li>{{$order->client_name}}</li>
                    <li>{{$order->client_address}}</li>
                    <li>{{$order->client_number}}</li>
                </ul>
            </div>
        </div>
        <div class="great">
            <h3>Riepilogo Ordine</h3>
        </div>
        <div class="list-order">
            <ul>
                @foreach($dishes as $dish)
                    <li>
                        <div class="dish_order">
                            <div class="img"><img
                                    src="{{asset('storage/'.$dish->img_path)}}"
                                    alt=""></div>
                            <div class="detail">
                                <div class="name-dish">{{$dish->name}} <span
                                        class="quantity">x{{$dish->pivot->quantita}}</span></div>
                                <div class="total_single_price">Prezzo: <span>{{$dish->pivot->quantita * $dish->price}} €</span>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="total">
            <h3>Totale Ordine : {{$order->total_price}} €</h3>
        </div>
        <div class="tracking">
            <h2>Qui puoi tracciare il tuo ordine</h2>
            <button>Traccia</button>
        </div>
    </div>
</div>
</body>
</html>
