@extends("layout")



@section("title")
@lang("site.cat")
@endsection

@section("content")
<x-navbar></x-navbar>


<div class="container-fluid" style="font-family: 'Almarai', sans-serif; color:#546173;">

    <p class="shadow p-2 mt-5 bg-body rounded"> <i class="fa-solid fa-house ms-3"></i>  @lang("site.cat")</p>



    @if($cats->isEmpty())
        <div class="alert alert-warning text-center">
            <h3 class="my-5">No Categories Yet...! </h3>
            <i class="fa-solid fa-cart-arrow-down fa-10x"></i>

        </div>
    @endif



<div class="row row-cols-1 row-cols-md-4 g-4">

    @foreach ($cats as $cat )

    <div class="col">
        <div class="card h-100 shadow bg-body rounded">
          <div class="card-body">
            <p class="card-title font fw-bold"> {{$cat->name}} <span class="fw-light" style="font-size: 13px">({{$cat->books_count }}) </span></p>






                @auth
                    @if(Auth::user()->is_admin == 1)
                        <a class="btn btn-warning btn-sm" href="{{route('cats.show',$cat->id)}}"><i class="fa-solid fa-eye"></i> @lang("site.show")</a>
                        <a class="btn btn-primary btn-sm" href="{{route('cats.edit',$cat->id)}}"><i class="fa-regular fa-pen-to-square"></i>  @lang("site.edit")</a>
                        <a class="btn btn-danger btn-sm" href="{{route('cats.del',$cat->id)}}"><i class="fa-solid fa-trash-can"></i>  @lang("site.delete")</a>
                    @endif
                @endauth


    </div>
        </div>
    </div>
    @endforeach


</div>




<x-footer></x-footer>
@endsection



