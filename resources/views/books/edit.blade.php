@extends("layout")

@section("title")
@lang("site.edit") - {{$book->id}}
@endsection

@section("content")
<x-navbar></x-navbar>

<div class="container mt-5">
@include("inc.errors")
    <form  method="POST" action="{{route('books.update',$book->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="text" name="title" placeholder="@lang('site.titleOfBook')" value="{{old("title" ) ?? $book->title}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="authorName" placeholder="@lang('site.authorName')" value="{{old('authorName'?? $book->authorName)}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="number" name="price" step="any" placeholder="@lang('site.price')" value="{{old('price' ?? $book->price)}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="desc" placeholder="@lang('site.DescOfBook')" value="{{old("desc") ?? $book->desc}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="img">
        </div>

        <div class="mb-3">
            <img src="{{asset('uploads/'.$book->img)}}" class="img-thumbnail" style="width: 150px;height:150" alt="...">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">@lang("site.edit")</button>
        </div>
    </form>
</div>

@endsection
