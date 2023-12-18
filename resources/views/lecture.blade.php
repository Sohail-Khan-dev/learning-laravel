@extends('layout.masterLayout')
    @section('content')
@section('title','Lecture Page')
    <h1> This is the Header </h1>
    <?php
        echo " Name is : ". $name . " Address is : " . $address;
    ?>
@endsection

