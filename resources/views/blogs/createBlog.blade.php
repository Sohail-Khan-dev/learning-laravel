@extends('layout.masterLayout')
@section('title','Create Blog')

@section('content')
    <h4> Welcome to Create Blog Page </h4>
    <h3 style="color: brown">
    @if(Session::has('message'))
        {{Session::get('message') }}
    @endif
    </h3>
    @section('dataWithoutTable')
{{--        <button type="submit" formaction="/"> Home s </button> <br> <br>--}}
        <form action="/addnewblog" method="get">
            @csrf
            <label for="name"> Name </label>
            <input type="text" name="name" placeholder="Enter Name" required>       <br/><br/>

            <label for="email"> email </label>
            <input type="text" name = "email" placeholder="Enter email" required>   <br/><br/>

            <label for="desc"> Description </label>
            <input type="text" name="desc" placeholder="Enter description" required><br/><br/>
            <br/>

            <button type="submit" name="submit"  > Submit </button>
            <br>
            <br>
            <br>
            <br>
            <a href="/"> Home </a>

        </form>
    @endsection


@endsection
