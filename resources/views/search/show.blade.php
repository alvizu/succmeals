@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('body-class', 'profile-page')

@section('styles')
  <style media="screen">
    .team .row .col-md-4, .team .row .col-sm-6 {
      margin-bottom: 5em;
    }
    .team .row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display:         flex;
    flex-wrap: wrap;
    }
    .team .row > [class*='col-'] {
    display: flex;
    flex-direction: column;
    }
  </style>
@endsection

@section('content')

<div class="wrapper">
    <div class="header header-filter" style="background-image: url('/img/bg-media-free.jpg');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar">
                            <img src="/img/search.png" alt="Imagen de busqueda" class="img-circle img-responsive img-raised">
                        </div>

                        <div class="name text-center">
                            <h3 class="title">Resultados de búsqueda</h3>
                        </div>

                        @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="description text-center">
                    <p>Se encontraron {{ $products->count() }} resultados para "{{ $query }}".</p>
                </div>

                <div class="team text-center">
                    <div class="row">
                        @foreach($products as $product)

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="team-player">
                                    <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                                    <h4 class="title">
                                      <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                                    </h4>
                                    <p class="description">{{ $product->description }} </p>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div class="text-center">
                      {{ $products->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>



@include('includes.footer')
@endsection
