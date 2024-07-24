@extends('layouts.frontendLayout')

@section('content')
<div class="container f-15">
    <div class="row w-75 m-auto">
        <div class="col d-flex flex-row h-12 bg-white">
            <a href="{{ url()->previous() }}" class="w-40 border-end ps-2 no_decorate"><i class="fa-solid fa-angle-up fa-rotate-270"></i></a>
            <div class="w-100 text-center f-18 bold">Orders history</div>
        </div>
    </div>
    @foreach($data as $products)

    @endforeach

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
@endsection



