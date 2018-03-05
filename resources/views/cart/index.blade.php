@extends('layouts.app')

@section('content')
    <div class="container">
    <h2>Card</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($basket as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->pivot->quantity}}</td>
                    <td>
                        <a href="{{route('cart.decrease', $item->id)}}"> <i class="fa fa-minus-square"></i> </a>
                        <a href="{{route('cart.delete', $item->id)}}"><i class="fa fa-trash"></i> </a>
                        <a href="{{route('cart.increase', $item->id)}}"> <i class="fa fa-plus-square"></i> </a>
                    </td>
                </tr>

            @empty
            <tr class="text-center">
            <td colspan="5"><h3>Your card is empty</h3></td>
            </tr>
            @endforelse

            </tbody>
        </table>
        <div class="text-right">
        <a class="btn btn-primary" href="{{route('order.create')}}">Make an order</a>
        </div>

    </div>
@endsection