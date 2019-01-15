@extends('layout.main')

@section('content')
    <div class="row">

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
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td width="50px">
                        {{$product->qty}}
                        {!! Form::open([ 'route' => ['cart.update',$product->rowId], 'method' => 'PUT']) !!}
                        <input name="qty" type="text" value="{{$product->qty}}">
                        <input type="submit" class="btn btn-sm btn-default" value="OK">

                        {!! Form::close() !!}
                    </td>
                    <td>{{$product->options->has('size')?$cart->options->size:''}}</td>
                </tr>
    @endforeach
            @endif


            {{--<tr>--}}
                {{--<td></td>--}}
                {{--<td>Grand total: ${{Cart::total()}}</td>--}}
                {{--<td> Items: {{Cart::count()}}</td>--}}
            {{--</tr>--}}

            </tbody>
        </table>

>>

</div>
@endsection