@extends('layouts.app')
@section('header_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@endsection
@section('content')
{{-- <div class="container">
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
</div> --}}
<div id="root">
    @{{response}}
    <ul>
        <li v-for="type in types" @click='getRestaurants(type.id)'>@{{type.name}}</li>
    </ul>
    <div v-if='restaurants.length > 0'>
        <ul>
            <li v-for='restaurant in restaurants'>
                <ul>
                    <li><img :src="'storage/' + restaurant.img_path" alt="Restaurant Cover"></li>
                    <li>@{{restaurant.company_name}}</li>
                </ul>
            </li>
        </ul>
    </div>
</div>
@endsection
@section('footer_script')
    <script src="{{ asset('js/vue.js') }}" charset="utf-8"></script>
@endsection
