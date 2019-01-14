@extends('layouts.main')

@section('content')
    <div class="row">
        <h3>Cart Items</h3>


        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>qty</th>
                <th>size</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{$cartItem->name}}</td>
                    <td>{{$cartItem->price}}</td>
                    <td>
                        {{$cartItem->qty}}
                        {!! Form::open(['route' => route ['cart.update',$cartItem->rowId], 'method' => 'put']) !!}
                        <input name="qty" type="text" value="{{$cartItem->qty}}">
                        <input type="submit" class="btn btn-sm btn-default" value="OK">

                        {!! Form::close() !!}
                    </td>
                    <td>{{$cartItem->options->has('size')?$cartItem->options->size:''}}</td>
                </tr>
    @endforeach

            <tr>
                <td></td>
                <td>Grand total: ${{Cart::total()}}</td>
                <td> Items: {{Cart::count()}}</td>
            </tr>

            </tbody>
        </table>


@endsection