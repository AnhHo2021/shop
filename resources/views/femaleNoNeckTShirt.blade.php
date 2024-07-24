@extends('layouts.frontendLayout')

@section('content')
<div class="container">
    <div class="h-100">
        @php
        $breadcrumb = 'Home > Women T-shirt > No Neck T-shirt';
        $title = 'No Neck T-SHIRTS PRODUCT LIST';
        $amountOfProducts = 30
        @endphp

        @include('./include/filter_head')

        <div class="row">
            @include('./include/filter_part')

            <div class="col-md-9 col-lg-10 filtering-active p-s">
                <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-4">
                    @if(count($products)>0)
                    @foreach($products as $item)

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