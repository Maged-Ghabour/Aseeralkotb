@extends("layout")

@section("title")
@lang("site.edit") - {{$author->id}}
@endsection

@section("content")
<x-navbar></x-navbar>

<div class="container mt-5">
@include("inc.errors")
    <form  method="POST" action="{{route('authors.update',$author->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input class="form-control" type="text" name="name" placeholder="@lang('site.authorName')" value="{{old("name" ) ?? $author->name}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="bio" placeholder="@lang('site.authorBiography')" value="{{old('bio')?? $author->bio}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="img">
        </div>

        <div class="mb-3">
            <img src="{{asset('uploads/Authors/'.$author->img)}}" class="img-thumbnail" style="width: 150px;height:150" alt="...">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">@lang("site.edit")</button>
        </div>
    </form>
</div>

@endsection
