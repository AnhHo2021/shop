@extends('layouts.frontendLayout')

@section('content')
<div class="container">
    <div class="h-100">
        @php
        $breadcrumb = 'Home > T-shirt > No Neck T-Shirt';
        $title = 'No Neck T-Shirt PRODUCT LIST';
        $amountOfProducts = 30
        @endphp

        @include('./include/filter_head')

        <div class="row">
            @include('./include/filter_part')

            <div class="col-md-9 col-lg-10 filtering-active p-s">
                <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-4">
                    @if(count($products)>0)
                    @foreach($products as $item)
                    <div class="col prd-item">
                        <div class="prd-item-info bg-white">
                            @if($item->prd_regular_price)
                            @php $decresing_price = ($item->prd_price/$item->prd_regular_price)* 100  @endphp
                            @endif
                            <div class="prd-item-decrease f-10 tl-10 bold text-center">
                                -{{round($decresing_price)}}%
                            </div>
                            <a href="{{ route('product.aothun',['prd_id' => $item->prd_id]) }}" class="prd-item-photo">
                            <span class="prd-image-container prd-item-photo-home">
                                <img class="prd-image-photo" src="{{ URL::to('/') }}/images/{{$item->prd_img}}" alt="anhho AnhHo">
                            </span>
                            </a>
                            <div class="prd-item-details">
                                <strong class="prd-item-name">
                                    <a title="{{$item->prd_name}}" class="prd-item-link"
                                       href="{{ route('product.aothun',['prd_id' => $item->prd_id]) }}">
                                        <div class="special-product-label mid-mid text-only ">
                                            <div class="text-center f-10 c-ff0000">
                                                <span>MỚI</span>
                                            </div>
                                        </div>
                                        {{$item->prd_name}}
                                    </a>
                                </strong>
                                <div class="d-inline fit-box">
                                    <span class="prd-price">${{number_format($item->prd_price, 0, '.', ',')}}</span>
                                    <span class="prd-regular-price">${{number_format($item->prd_regular_price, 0, '.', ',')}}</span>
                                </div>
                                <?php
                                if($item->multi_colors !=''){
                                    ?>
                                    <div class="d-flex flex-row  fit-box">
                                        <?php
                                        if(strpos($item->multi_colors,",")){
                                            $prd_library = explode(',',$item->multi_colors);
                                            foreach($prd_library as $image){
                                                ?>
                                                <span class="prd-img-color">
                                                <img class="img-thumbnail img-circle" src="{{ URL::to('/') }}/images/{{$image}}" alt="Thiet ke web Anh Ho">
                                            </span>
                                            <?php
                                            }
                                        }else{ ?>
                                            <span class="prd-img-color">
                                                <img class="img-thumbnail img-circle" src="{{ URL::to('/') }}/images/{{$item->multi_colors}}" alt="Thiet ke web Anh Ho">
                                            </span>
                                        <?php }
                                        ?>
                                    </div>
                                <?php
                                }else{
                                    ?>
                                    <span class="prd-img-color">
                                                <img class="img-thumbnail img-circle" src="{{ URL::to('/') }}/images/{{$item->prd_img}}" alt="Thiet ke web Anh Ho">
                                            </span>
                                <?php
                                }
                                ?>

                                <div class="d-flex flex-row justify-content-end f-12 my-1 bold">
                                    @php
                                    $amountOfProduct = '';
                                    if($item->amount_of_sold !=null){
                                    $amountOfProduct = $item->amount_of_sold;
                                    }
                                    @endphp
                                    <i>Sold: {{$amountOfProduct}}</i>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        $(function() {
            $('#my-testimonial.carousel').carousel({
                interval: 10000,
                wrap: false
            })
        });

        $('#my-testimonial .carousel-item').each(function(){
            var minPerSlide = 5;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    });
</script>
<script  src="{{ URL::to('/') }}/assets/js/filter.js"></script>
<script>
    /*var coll = document.getElementsByClassName("collapsible");
     var i;

     for (i = 0; i < coll.length; i++) {
     coll[i].addEventListener("click", function() {
     this.classList.toggle("active");
     var content = this.nextElementSibling;
     if (content.style.maxHeight){
     content.style.maxHeight = null;
     } else {
     content.style.maxHeight = content.scrollHeight + "px";
     }
     });
     }*/

    $('.collapsible').unbind('click').bind('click',function(){
        this.classList.toggle("collapsible-active");
        var collapse_content = this.nextElementSibling;
        if (collapse_content.style.maxHeight){
            collapse_content.style.maxHeight = null;
        } else {
            collapse_content.style.maxHeight = collapse_content.scrollHeight + "px";
        }
    })
</script>
@endsection