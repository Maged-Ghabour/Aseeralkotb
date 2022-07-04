@extends("layout")
@section("title")
Register
@endsection
@section("content")


<div class="container">


   <div class="mw-100">
    <form method="POST" action="{{route('auth.handleRegister')}}" class="p-5 w-50 mx-auto shadow-lg p-3 mb-5 bg-white rounded">
        <img class="rounded mx-auto d-block" style="height: 40%;width:40%" src="{{asset('imgs/undraw_Sign_in_re_o58h.png')}}" alt="">
        @include("inc.errors")
        @csrf
        <!-- Name input -->
        <div class="form-outline mb-2 ">
           <input type="text" id="form2Example1" class="form-control" name="name" value="{{old('name')}}" />
           <label class="form-label" for="form2Example1">@lang("site.name")</label>
         </div>

           <!-- userName input -->
        <div class="form-outline mb-2 ">
            <input type="text" id="form2Example1" class="form-control" name="userName" value="{{old('userName')}}" />
            <label class="form-label" for="form2Example1">@lang("site.userName")</label>
          </div>

       <!-- Email input -->
       <div class="form-outline mb-2  ">
         <input type="email" id="form2Example1" class="form-control" name="email" value="{{old('email')}}" />
         <label class="form-label" for="form2Example1">@lang("site.email")</label>
       </div>

       <!-- Password input -->
       <div class="form-outline mb-2  ">
         <input type="password" id="form2Example1" class="form-control" name="password"/>
         <label class="form-label" for="form2Example1">@lang("site.pass")</label>
       </div>

         <!-- Password input -->
         <div class="form-outline mb-2  ">
            <input type="password" id="form2Example2" class="form-control" name="password_confirmation"/>
            <label class="form-label" for="form2Example2">@lang("site.pass1")</label>
          </div>


       <!-- Submit button -->
       <button  class="btn btn-primary btn-block mb-2">@lang("site.sign")</button>



    </form>
   </div>
</div>
@endsection
