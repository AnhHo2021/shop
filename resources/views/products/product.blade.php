
@extends('layouts.adminLayout')

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
            <?php
            $prd_id='';
            $prd_type_name ='';
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
            $multi_sexes='';
            $prd_tag ='';
            $prd_relative ='';
            $prd_img ='';
            $prd_library ='';
            if(isset($product)){
                $prd_id=$product->prd_id;
                $prd_type_name ="<option value='".$product->prd_type."'>$product->prd_type_name</option>";
                $prd_batch_code = $product->prd_batch_code;
                $prd_name= $product->prd_name;
                $prd_quantity= $product->prd_quantity;
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
                $multi_sexes = $product->multi_sexes;
                $prd_tag = $product->prd_tag;
                $prd_relative = $product->prd_relative;
                $prd_img = $product->prd_img;
                $prd_library = $product->prd_library;
            }

            ?>
            @if(isset($product))
            <form class="form-white" action="{{ route('product.update', $prd_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @else
              </div>
    </div>
</div>
<script>const js_prd_type_name = {{ Js::from($prd_type_name) }};</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/product/product.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/library_images.js"></script>
<script  src="{{ URL::to('/') }}/assets/js/common.js"></script>

@endsection


