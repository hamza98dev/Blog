@extends('layouts.frontend.app')

@section('title','Category')

@push('css')
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
   
@endpush
@section('content')
<section class="blog-area section">
    <div class="container">

        <div class="row">
            @forelse($categories as $categorie)
                <div class="col-lg-4 col-md-6 ">
                    <div class="card h-100 ">
                        <div style="background-color:#F1F3F5" class="single-post post-style-1">

                            <div  class="blog-image"><img style="height:200px" src="{{asset('storage/'.$categorie->image)}}" alt="{{ $categorie->name }}"></div>



                            <div style="background-color:#F1F3F5" class="blog-info">
                           
                            <h2  class="st mt-3"><a href="{{route('category.posts',$categorie->slug)}}"><b style="font-family: 'Montserrat', sans-serif;font-size:25px">{{ $categorie->name }}</b></a></h2>
                           

                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->
            @empty 
                <div class="col-lg-12 col-md-12">
                    <div class="card h-100">
                        <div class="single-post post-style-1 p-2">
                           <strong>No Categorie Found :(</strong>
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-lg-4 col-md-6 -->
            @endforelse
        </div><!-- row -->

       

    </div><!-- container -->

</section>
@endsection