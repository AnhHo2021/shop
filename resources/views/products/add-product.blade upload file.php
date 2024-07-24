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

            <form class="form-white" action="{{ url('add-product') }}" method="post" enctype="multipart/form-data">
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
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="./assets/js/library_file.js"></script>
<script type="text/javascript">

  $( document ).ready(function() {

  });

</script>
