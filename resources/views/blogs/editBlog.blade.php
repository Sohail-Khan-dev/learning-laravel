@extends('layout.masterLayout')
@section('title','Edit Blog')

@section('content')
    <h4> Welcome to Edit Blog Page </h4>
    <h3 style="color: brown">
    @if(Session::has('message'))
        {{Session::get('message') }}
    @endif
    </h3>
    @section('dataWithoutTable')
        <br/>
        @csrf
        <form action="/update-blog/{{$blog->id}}" method="get">
            <label for="name"> Name </label>
            <input type="text" name="name" value="{{$blog->name}}" required>  <br/><br/>

            <label for="email"> email </label>
            <input type="text" name = "email" value="{{$blog->email}}" required> <br/><br/>

            <label for="desc"> Description </label>
            <input type="text" name="desc" value="{{$blog->desc}}" required><br/><br/>
            <br/>
            <button type="submit" name="submit"  > Update Blog </button>
            <br>
            <br>
            <br>
            <br>
            <a href="/"> Home </a>
        </form>
    @endsection

@endsection
