<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('mycss/style.css'); }}">    
</head>    
<body>  
   <h2>Login Page</h2><br> 
    <div class="login"> 
    @if(session() ->has('message'))
    <p>{{session()->get('message')}}</p>
     @endif   
    <form action="{{route('do_login')}}" id="login" method="post">  
      @csrf  
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="name" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="password" id="Pass" placeholder="Password">    
        <br><br>    
        <input type="submit" name="log" id="log" value="Log In Here">       
        <br><br>    
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br>    
        Forgot <a href="#">Password</a>    
    </form>     
</div>    
</body>    
</html>     
