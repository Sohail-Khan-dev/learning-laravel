<div>
@if($errors->any())
<ui>
    @foreach($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ui>
@endif
<form action="{{route('login')}}" method="post">
         <!-- The csrf token is very important if we dind't sent this with form it will send session expire error -->
     @csrf   
     <label for="email">email</label>
        <input type="text" name="email">
        <label for="password">Password</label>
        <input type="text" name="password">
        <button type="submit" > Login</button>
    </form>
</div>