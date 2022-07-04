@extends("layout")


@section("title")
    @lang("site.authors")
@endsection

@section("content")
<x-navbar></x-navbar>



<div class="container-fluid" style="font-family: 'Almarai', sans-serif;">
    <p class="shadow p-2 mt-5 bg-body rounded text-muted"> <i class="fa-solid fa-house ms-3"></i>  @lang("site.authors")</p>


    @if ($authors->isEmpty())
    <div class="m-auto text-center mx-auto shadow-lg p-3 mb-5 bg-white rounded">
        <h1 class="text-center mt-3 text-muted">لايوجد مؤلفين بعدد </h1>
        <img class="img-fluid w-50 h-50" src="{{asset('imgs/undraw_Books_re_8gea.png')}}" alt="">
    </div>

    @endif

<div class="row row-cols-1 row-cols-md-4 g-4">


    @foreach ($authors as $author )


    <div class="col">
        <div class="card h-100 text-center">

          <img src="{{asset("uploads/Authors/" . $author->img)}}" class="p-2 rounded rounded-circle mx-auto d-block" style="width:128px;height:128px" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$author->name}}</h5>
            <p class="card-text text-muted">
                {{ substr(strip_tags($author->bio), 0, 500) }}
                {{ strlen(strip_tags($author->bio)) > 100 ? " .... اقرأ المزيد" : "" }}

            </p>

{{--
                <a class="btn btn-secondary btn-sm" href="{{route('authors.show',$author->id)}}"><i class="fa-solid fa-eye"></i> @lang("site.show")</a> --}}


                @auth
                @if (Auth::user()->is_admin == 1)
                <a class="btn btn-primary btn-sm" href="{{route('authors.edit',$author->id)}}"><i class="fa-regular fa-pen-to-square"></i> @lang("site.edit")</a>
                <a class="btn btn-danger btn-sm" href="{{route('authors.delete',$author->id)}}"><i class="fa-solid fa-trash-can"></i> @lang("site.delete")</a>
                @endif

                @endauth



          </div>
        </div>
      </div>



    @endforeach
</div>




    {{-- <div class="mt-3"> {{$books->links()}}</div> --}}

   </div>

@endsection

