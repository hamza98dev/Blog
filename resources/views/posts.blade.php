@extends('layouts.frontend.app')

@section('title','Posts')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="{{ asset('assets/frontend/css/category/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/category/responsive.css') }}" rel="stylesheet">
    <style>
        .txt{
            position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);z-index:999;
        font-weight: bold;
        }
        .favorite_posts{
            color: blue;
        }
        .head{
            height: 92vh;
            width: 100%; 
        }
            .st{
                font-size: 17px;
            }
            .st:hover{
                transition:0.7s ease-in-out;
                transform:scale(1.02);  
            }
            .blog-area .section{
                background-color: #5198BF !important;
            }
           
    </style>
@endpush

@section('content')
    {{-- <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>ALL POSTS</b></h1>
    </div><!-- slider --> --}}
<div class="head">

        {{-- <img src="{{ Storage::disk('public')->url('post/'.$last->image) }}" alt=""> --}}
@if ($last == NULL)
    
<div class="col-md-8 txt animated fadeIn slow">
    <a href="#">

   <h1 class="" style="color:white;font-family: 'Montserrat', sans-serif;font-size:55px">No Post Found</h1><br>
    </a>     
   <div class="row">
            <div class="col-md-1 col-sm-1">
                <img style="height:60px;width:65px" class="rounded-circle"  src="" alt="photo">
            </div>
            <div class="col-md-6 col-sm-4 ml-2 ">
               <p style="color: white;font-weight: bold;font-family: 'Montserrat', sans-serif;">no user</p>
            <p style="color:white;font-family: 'Montserrat', sans-serif;">Published </p>
            </div>
        </div>
   </div>
   <img style="object-fit:fit;height:92vh;width:100%;position:absolute;filter: brightness(25%);" src="https://image.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg" alt="">

@else
<div class="col-md-8 txt animated fadeIn slow">
    <a href="{{ route('post.details',[$last->categorie->name,$last->slug]) }}">

   <h1 class="" style="color:white;font-family: 'Montserrat', sans-serif;font-size:55px"> {{$last->title}}</h1><br>
    </a>     
   <div class="row">
            <div class="col-md-1 col-sm-1">
                <img style="height:60px;width:65px" class="rounded-circle"  src="{{asset('storage/'.$publisher->image)}}" alt="photo">
            </div>
            <div class="col-md-6 col-sm-4 ml-2 ">
               <p style="color: white;font-weight: bold;font-family: 'Montserrat', sans-serif;">{{$publisher->name}}</p>
            <p style="color:white;font-family: 'Montserrat', sans-serif;">Published {{$last->created_at->diffForHumans()}}</p>
            </div>
        </div>
   </div>

   <img style="object-fit:fit;height:92vh;width:100%;position:absolute;filter: brightness(25%);" src="{{asset('storage/'.$last->image)}}" alt="">

@endif

           
            
       
        {{-- {{ Storage::disk('public')->url('post/'.$post->image) }} --}}
</div>
    <section class="blog-area section">
        <div class="container">

            <div class="row">
                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6 animated zoomIn slow ">
                        <div class="card h-100 ">
                            <div style="background-color:#F1F3F5" class="single-post post-style-1">

                                <div  class="blog-image"><img style="height:200px" src="{{asset('storage/'.$post->image)}}" alt="{{ $post->title }}"></div>

                                <a class="avatar" href="#"><img src="{{asset('storage/'.$publisher->image)}}" alt="Profile Image"></a>
                                {{-- <a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a> --}}


                                <div style="background-color:#F1F3F5" class="blog-info">
                                 
                                    <h2  class="st"><a href="{{ URL::route('post.details',[$post->categorie->name,$post->slug]) }}"><b style="font-family: 'Montserrat', sans-serif;">{{ $post->title }}</b></a></h2>
                                {{-- <p>{{$post->categorie->name}}</p> --}}
                                    {{-- <ul class="post-footer">

                                        <li>
                                            @guest
                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                            @else
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                                <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest

                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul> --}}

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @empty 
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                               <strong>No Post Found :(</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
            </div><!-- row -->

            {{ $posts->links() }}

        </div><!-- container -->

    </section><!-- section -->

@endsection

@push('js')

@endpush