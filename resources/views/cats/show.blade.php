@extends("layout")

@section("title")
Category {{$cat->id}}
@endsection
@section("content")
<x-navbar></x-navbar>
<div class="container-fluid mt-5 bg ">
    <h3 class="text-muted text-center fw-bold">{{$cat->name}}</h3>
<p class="shadow p-2 mt-5 bg-body rounded"> <i class="fa-solid fa-house ms-3"></i>  @lang("site.cat")
    <i class="fa-solid fa-angle-left mx-2"></i>
    {{$cat->name}}</p>


    <div class="row row-cols-1 row-cols-md-6 g-2">
        @foreach ( $cat->books as  $book)
        <div class="col">
            <div class="card h-100">

            <img src="{{asset("uploads/" . $book->img)}}" class="card-img-top" alt="...">
            <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">{{$book->authorName}}</p>
            </div>
            <div class="card-footer">
                <small class="text-success">{{$book->price}} ج.م </small>
              </div>
            </div>

        </div>
        @endforeach
    </div>
        <a  class="btn btn-danger mt-3" href="{{ route('cats.index')}}">@lang("site.back")</a>
    </div>
</div>





@endsection
