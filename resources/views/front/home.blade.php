@extends('layout.main')

@section('content')
    <section class="hero text-center">
        <br/>
        <br/>
        <br/>
        <br/>
        <h2 >
            <strong>
                Hey! Welcome to Regina Phalangy Store
            </strong>
        </h2>
        <br>
        <a href="{{'/shirts'}}">
            <button class="button large">Check out My Shirts</button></a>
    </section>
    <br/>
    <div class="subheader text-center">
        <h2>
            Regina Phalangy shirts
        </h2>
    </div>

    <!-- Latest SHirts -->
    <div class="row">
        @forelse($shirts->chunk(4) as $chunk)
            @foreach($chunk as $shirt)
                <div class="small-3 medium-3 large-3 columns">
                    <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('cart.edit',$shirt->id)}}" class="button expanded add-to-cart">
                            Add To cart
                            <a href="#">
                                <img src="{{url('images',$shirt->image)}}"/>
                            </a>
                        </a>

                        <a href="{{route('shirt')}}">
                            <h3>
                                {{$shirt->name}}
                            </h3>
                        </a>
                        <h5>
                            ${{$shirt->price}}
                        </h5>
                        <h5>
                            ${{$shirt->description}}
                        </h5>

                    <product :shirt="{{$shirt}}"
                             shirtlink="{{route('shirt',$shirt->id)}}"
                             shirtimagepath='{{asset("images/$shirt->image")}}'
                    >
                    </product>
                </div>
                </div>
                </div>

    </div>
    </div>
            @endforeach
        @empty
            <h3>No shirts</h3>
        @endforelse
    </div>

    <!-- Footer -->
    <br>
@endsection