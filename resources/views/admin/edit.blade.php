@extends('layouts.app')
@section('header_script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
@endsection
@section('app_style', 'user')

@section('app-vertical-class', 'col-1')

@section('app-content-class')
    openBasket ? 'col-7 col-md-8' : 'col-10 col-md-11'
@endsection

@section('vertical-nav')
    <!-- Inizio Menu Verticale -->
    <div class="icons-container">
        <a href="{{route('admin.user.index')}}"><i class="fas fa-home icon home-icon"></i></a>
        <a href="{{route('admin.user.create')}}"><i class="far fa-edit icon active"></i></a>
        <a href="{{route('admin.restaurant-listOrder')}}"><i class="fas fa-shopping-cart icon"></i></a>
        <a href="{{route('admin.restaurant-statistics', ['id' => Illuminate\Support\Facades\Auth::user()->id])}}"><i
                class="fas fa-chart-line icon"></i></a>
    </div>
    <!-- Fine Menu Verticale -->
@endsection
ì
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
            <h6>Modifica il piatto</h6>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <form action=" {{ route('admin.user.update', [ 'user' => $dish->id ]) }} " method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nome Piatto</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', $dish->name) }}">
                </div>

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <input type="text" class="form-control" id="description" name="description"
                           value="{{ old('description', $dish->description) }}">
                </div>

                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <input type="number" step=".01" class="form-control" id="price" name="price"
                           value="{{ old('price', $dish->price) }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <p>Visibilità</p>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="visible" name="visibility" value="1"
                                {{ old('visibility', $dish->visibility) == 1 ? 'checked' : '' }}>
                            <label for="visible" class="form-check-label">Si</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="not-visible" name="visibility" value="0"
                                {{ old('visibility', $dish->visibility) == 0 ? 'checked' : '' }}>
                            <label for="not-visible" class="form-check-label">No</label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <p>Tipologia</p>
                        @foreach($array_type as $type)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type_id" id="type_{{$type->id}}" value="{{$type->id}}" {{ old('type_id', $type->id) === $dish->type_id ? 'checked' : '' }}>
                                <label class="form-check-label" for="type_{{$type->id}}">
                                    {{$type->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="category">Indica la categoria del piatto</label>
                    <select class="form-control" name="category_id">
                        <option value="">Scegli</option>
                    @foreach ($categories as $category)
                        <!-- il ternario fa in modo che la option rimanga selezionata in caso non vada a buon fine la creazione del nuovo post -->
                            <option
                                value="{{ $category->id }}" {{ (old('category', $dish->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div>
                        <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}"
                             style="width: 90px;">
                        <label for="img_path" style="display: block;">Inserisci un'immagine di copertina</label>
                        <input type="file" class="form-control-file" id="img_path" name="img_path">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary my-4">Salva</button>
            </form>
        </div>
        <div class="col-12 col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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



















{{--@extends('layouts.app')--}}
{{--@section('app_style', 'user')--}}
{{--@section('content')--}}

{{--<div>--}}
{{--    <h1>Aggiungi un piatto</h1>--}}

{{--    <form action=" {{ route('admin.user.update', [ 'user' => $dish->id ]) }} " method="post" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        <div class="form-group">--}}
{{--            <label for="name">Nome Piatto</label>--}}
{{--            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="description">Descrizione</label>--}}
{{--            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $dish->description) }}">--}}
{{--        </div>--}}
{{--        --}}
{{--        <div class="form-group">--}}
{{--            <label for="price">Prezzo</label>--}}
{{--            <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <p>Visibilità</p>--}}
{{--            <div class="form-check">--}}
{{--                <input type="radio" class="form-check-input" id="visible" name="visibility" value="1"--}}
{{--                {{ old('visibility', $dish->visibility) == 1 ? 'checked' : '' }}>--}}
{{--                <label for="visible" class="form-check-label">Si</label>--}}
{{--            </div>--}}

{{--            <div class="form-check">--}}
{{--                <input type="radio" class="form-check-input" id="not-visible" name="visibility" value="0"--}}
{{--                {{ old('visibility', $dish->visibility) == 0 ? 'checked' : '' }}>--}}
{{--                <label for="not-visible" class="form-check-label">No</label>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="category">Indica la tipologia del piatto</label>--}}
{{--                <select class="form-control" name="category_id">--}}
{{--                    <option value="">Scegli</option>--}}
{{--                        @foreach ($categories as $category)--}}
{{--                            <!-- il ternario fa in modo che la option rimanga selezionata in caso non vada a buon fine la creazione del nuovo post -->--}}
{{--                            <option value="{{ $category->id }}" {{ (old('category', $dish->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>--}}
{{--                        @endforeach--}}
{{--                </select>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <div>--}}
{{--                <img src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}" style="width: 200px;">--}}
{{--                <label for="img_path" style="display: block;">Inserisci un'immagine di copertina</label>--}}
{{--                <input type="file" class="form-control-file" id="img_path" name="img_path">--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <button type="submit" class="btn btn-primary my-4">Salva</button>--}}
{{--    </form>--}}
{{--</div>--}}

{{--@endsection--}}
