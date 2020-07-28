@extends('layouts.app')

@section('content') 

<div class="container">
    <h1>Partograph</h1>

        <div class="w-1/2">
            {!! $fhr->container() !!}
        </diV>

    {!! $fhr->script() !!}

</div>
    
@endsection