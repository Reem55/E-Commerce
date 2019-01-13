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

                    <product :shirt="{{$shirt}}"
                             shirtlink="{{route('shirt',$shirt->id)}}"
                             shirtimagepath='{{asset("images/$shirt->image")}}'
                    >
                    </product>

                </div>
            @endforeach
        @empty
            <h3>No shirts</h3>
        @endforelse
    </div>

    <!-- Footer -->
    <br>
@endsection