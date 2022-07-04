@extends("layout")

@section("title")
@lang("site.addBook")
@endsection

@section("content")


<x-navbar></x-navbar>

<div class="container mt-5">

@include("inc.errors")
    <form  method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input class="form-control" type="text" name="title" placeholder="@lang('site.titleOfBook')" value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="authorName" placeholder="@lang('site.authorName')" value="{{old('authorName')}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" id="myTextFieldId"  name="price" placeholder="@lang('site.price')" value="{{old('price')}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="desc" placeholder="@lang('site.DescOfBook')" value="{{old('desc')}}">
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="img" >
        </div>

        <div class="mb-3 w-25">
            <h5 class="mb-3 text-decoration-underline">@lang("site.ChooseCat")</h5>

            @foreach ($cats as $cat)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cat_ids[]" value="{{$cat->id}}" id="{{$cat->id}}">
                <label class="form-check-label" for="{{$cat->id}}">
                    {{$cat->name}}
                </label>
            </div>
            @endforeach


        </div>

        <div class="mb-3">
            <button class="btn btn-primary">@lang("site.add")</button>
        </div>
    </form>
</div>
@endsection


@section("scripts")
<script>
    document.getElementById('myTextFieldId').addEventListener("keypress", function(e){
    let code=e.keyCode-48;
            if (code>=0 && code<10) {
            e.target.value = e.target.value.slice(0,e.target.selectionStart)
            + "٠١٢٣٤٥٦٧٨٩"[code]
            + e.target.value.slice(e.target.selectionEnd);
            e.target.selectionStart = e.target.selectionEnd = e.target.selectionStart + 1;
            e.preventDefault();
                }
            })
</script>
@endsection


