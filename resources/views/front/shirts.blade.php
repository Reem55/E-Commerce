@extends('layout.main')
@section('title', 'shirts')
@section('content')
    <div class="row">
        @forelse($shirts as $shirt)
        <div class="small-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a class="button expanded add-to-cart">
                        Add to Cart
                    </a>
                    <a href="#">
                        <img src="{{url('images',$shirt->image)}}"/>
                    </a>
                </div>
                <a href="{{route('shirt')}}">
                    <h3>
                        {{$shirt->name}}
                    </h3>
                </a>
                <h5>
                    ${{$shirt->price}}

                    $19.99
                </h5>
                <p>
                    {{$shirt->description}}
                </p>
            </div>
        </div>
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a class="button expanded add-to-cart">
                        Add to Cart
                    </a>
                    <a href="{{route('cart.edit',$shirt->id)}}" class="button expanded add-to-cart">                        <img src="http://i.imgur.com/Mcw06Yt.png"/>
                    </a>
                </div>
                <a href="#">
                    {{--<h3>--}}
                        {{--Kickin with Kraken Tee--}}
                    {{--</h3>--}}
                </a>
                <h5>
                    $19.99
                </h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin posuere sem enim, accumsan convallis risus semper.
                </p>
            </div>
            @empty
            <h3>No shirts</h3>
            @endforelse
        </div>
    </div>
    </body>
    @endsection
