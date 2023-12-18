@extends('layout.masterLayout')
@section('content')
@section('title','Blogs')
<h1> The Data From Blog Controller Index is : {{$name}}</h1>
<h2> The Number is : {{$num}}</h2>
@if($num %2 == 0)
    <h3> The Number is even</h3>
@else
    <h3> The Number is Odd </h3>
@endif
<br> <br>

@for($i=0; $i < $num; $i++)
    {{  'Number is : ' .   $i . " "  }}
    <br>

@endfor
@endsection
