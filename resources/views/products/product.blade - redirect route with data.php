
@extends('layouts.frontendLayout')

@section('content')
<div class="container">
    <div class="card bg-white">
        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @php
                $prd_id='';
                $prd_batch_code='';
                $prd_name='';
                $prd_quantity='';
                $prd_type ='';
                $prd_sku ='';
                $prd_quantity ='';
                $prd_price ='';
                $prd_regular_price ='';
                $prd_disctiption ='';
                $prd_short_disctiption ='';
                $prd_sex  ='';
                $prd_size ='';
                $prd_color ='';
                $multi_colors ='';
                $multi_sizes ='';
            $prd_tag ='';
            $prd_relative ='';
            $prd_img ='';
            $prd_library ='';

            @endphp
            @if(Session::has('product'))
                @php
                    $product = Session::get('product');

                    $prd_name= $product->prd_name;
                    $prd_quantity= $product->prd_quantity;
                    $prd_id=$product->prd_id;
                    $prd_batch_code = $product->prd_batch_code;
                    $prd_type = $product->prd_type;
                    $prd_sku = $product->prd_sku;
                    $prd_price = $product->prd_price;
                    $prd_regular_price = $product->prd_regular_price;
                    $prd_disctiption = $product->prd_disctiption;
                    $prd_short_disctiption = $product->prd_short_disctiption;
                    $prd_sex = $product->prd_sex;
                    $prd_size= $product->prd_size;
                    $prd_color = $product->prd_color;
                    $multi_colors = $product->multi_colors;
                    $multi_sizes = $product->multi_sizes;
                    $prd_tag = $product->prd_tag;
                    $prd_relative = $product->prd_relative;
                    $prd_img = $product->prd_img;
                    $prd_library = $product->prd_library;
                @endphp
            <form class="form-white" action="{{ route('product.update', $prd_id) }}" method="post" enctype="multipart/form-data">
            @else
            <form class="form-white" action="{{ url('product') }}" method="post" enctype="multipart/form-data">
            @endif
                @csrf

            <div class="row justify-content-md-center">
                <div class="col-md-1 col-xs-6 col-sm-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-md-1 col-xs-6 col-sm-6">
                    <button class="btn btn-secondary">Cancel</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/product/product.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/library_images.js"></script>



@endsection


