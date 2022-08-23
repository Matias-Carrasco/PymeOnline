@extends('adminlte::page')


@section('content')
    <div class="container card">
        <div class="card-header">
            <h3 class="card-title">Carrito</h3>
        </div>

        @if (session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if (session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if (count($errors) > 0)
            @foreach ($errors0 > all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="card-body" style="display: block;">

            <br>
            @if (\Cart::getTotalQuantity() > 0)
                <h4>{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4><br>
            @else
                <h4>No existen productos en tu carrito</h4><br>
                <a href="/publicacion" class="btn btn-dark">Continuar en la tienda</a>
            @endif

            @foreach ($cartCollection as $item)
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{ $item->attributes->image }}" class="img-thumbnail" width="200"
                            height="200">
                            
                    </div>
                    <div class="col-lg-5">
                        <p>
                            <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                            <b>Precio: </b>${{ $item->price }}<br>
                            <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                            {{-- <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }} --}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <form action="{{ route('cart.update') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <input type="number" class="form-control form-control-sm"
                                        value="{{ $item->quantity }}" id="quantity" name="quantity"
                                        style="width: 70px; margin-right: 10px;">
                                    <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i
                                            class="fa fa-edit"></i></button>
                                </div>
                            </form>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
            @if (count($cartCollection) > 0)
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary btn-md">Borrar Carrito</button>
                </form>
            @endif

            @if (count($cartCollection) > 0)
                <div class="row">
                    <div class="col-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }}</li>
                        </ul>
                        <br><a href="/publicacion" class="btn btn-dark">Continuar en la tienda</a>
                        <a href="/checkout" class="btn btn-success">Proceder al Checkout</a>
                        <br>
                        <br>
                    </div>

                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
