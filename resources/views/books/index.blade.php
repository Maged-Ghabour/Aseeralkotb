@extends("layout")



@section("title")
@lang("site.allBooks")
@endsection

@section("style")



<link rel="stylesheet" href="{{asset('css/rating.css')}}">
<style>

    .pagination > li > a:focus,
    .pagination > li > a:hover,
    .pagination > li > span:focus,
    .pagination > li > span:hover {
    z-index: 3;
    color: #b46206;
    background-color: rgb(220, 243, 92);
    border-color: #ddd;
}
.fa-cart-shopping {
    color: rgb(140, 145, 225);
}

</style>
@endsection


@section("content")
<x-navbar></x-navbar>



<div class="container-fluid">

    <p class="shadow p-2 mt-5 bg-body rounded"> <i class="fa-solid fa-house ms-3"></i>  @lang("site.allBooks")</p>


    @if ($books->isEmpty())
    <div class="m-auto text-center mx-auto shadow-lg p-3 mb-5 bg-white rounded">
        <h1 class="text-center mt-3 text-muted">لايوجد كتب متوفره بعد </h1>
        <img class="img-fluid w-50 h-50" src="{{asset('imgs/undraw_Books_re_8gea.png')}}" alt="">
    </div>

    @endif

<div class="row row-cols-1 row-cols-md-6 g-1">


    @foreach ($books as $book )


    <div class="col">
        <div class="card h-100 text-center">

          <img src="{{asset("uploads/" . $book->img)}}" class="card-img-top" alt="...">
          <div class="card-body">


            <!-- Book Rating -->

            <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
            </div>



            <!-- End book Rating -->
            <h5 class="card-title mb-3">{{$book->title}}</h5>
            <p class="card-text">{{$book->authorName}}</p>

                <a class="btn btn-secondary btn-sm" href="{{route('books.show',$book->id)}}"><i class="fa-solid fa-eye"></i> @lang("site.show")</a>


                @auth
                @if (Auth::user()->is_admin == 1)
                <a class="btn btn-primary btn-sm" href="{{route('books.edit',$book->id)}}"><i class="fa-regular fa-pen-to-square"></i> @lang("site.edit")</a>
                <a class="btn btn-danger btn-sm" href="{{route('books.del',$book->id)}}"><i class="fa-solid fa-trash-can"></i> @lang("site.delete")</a>
                @endif

                @endauth

                @auth
                    @if(Auth::user()->is_admin == 0)
                <a class="btn btn-warning btn w-100 my-2" href="#"> <i class="fa-solid fa-cart-shopping white"></i>@lang("site.addToCard")</a>
                    @endif
                @endauth


          </div>

          <div class="card-footer">
            <small class="text-success">{{$book->price}} ج.م</small>
          </div>
        </div>
      </div>



    @endforeach
</div>




    {{-- <div class="mt-3"> {{$books->links()}}</div> --}}

   </div>


   <x-footer></x-footer>
@endsection





