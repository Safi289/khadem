<style type="text/css">
        
        body{
  font-family: 'Lato', sans-serif;
  padding: 50px;
}

.profile-bar{
  background-image: url(https://i.pinimg.com/originals/ae/84/18/ae8418bc8397210c37ba7fc802dbc020.jpg);
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  max-height: 100%;
  max-width: 100%;
  color: #eee;
}

.profile-bar .contents{
  background-color: rgba(0,0,0,0.65);
}

.profile-bar .contents img{
  display: block;
  width: 70px;
  margin: auto;
  padding-top: 25px;
}

.profile-bar .contents .profile-name{
  text-align: center;
  margin: 10px 0px;
  font-size: 18px;
  font-weight: 300;
}

.profile-bar .contents .profile-description{
  text-align: center;
  margin: 10px 0px;
  font-weight: 300;
}

.profile-bar .contents .buttons{
  text-align: center;
  background-color: rgba(31,45,61,.7);
}

.profile-bar .contents .buttons ul{
  list-style: none;
  -webkit-padding-start: 0;
}

.profile-bar .contents .buttons ul li{
  display: inline-block;
  margin: 15px 20px;
}

.profile-bar .contents .buttons ul li a{
  color: #eee;
  font-size: 32px;
  display: block;
  text-decoration: none;
  opacity: 0.7;
  transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a:hover{
  opacity: 1;
  transition: 0.2s all linear;
}

.profile-bar .contents .buttons ul li a span{
  font-size: 14px;
  display: block;
}





@import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

body {
    background-color: #545454;
    font-family: "Poppins", sans-serif;
    font-weight: 300
}

.card {
    padding: 10px;
    border: none
}

.height {
    height: 100vh
}

.inputs span {
    font-size: 13px;
    font-weight: 600;
    color: #9e9e9e
}

.inputs input {
    height: 48px;
    border: 2px solid #9e9e9e
}

.inputs input:focus {
    border: 2px solid blue;
    box-shadow: none
}

label.radio {
    cursor: pointer;
    width: 100%
}

label.radio input {
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    pointer-events: none
}

label.radio span {
    padding: 7px 14px;
    border: 2px solid blue;
    display: inline-block;
    color: blue;
    border-radius: 3px;
    text-transform: uppercase;
    width: 100%;
    height: 49px;
    display: flex;
    justify-content: start;
    align-items: center
}

label.radio input:checked+span {
    border-color: blue;
    background-color: blue;
    color: #fff;
    width: 100%;
    height: 49px;
    display: flex;
    justify-content: start;
    align-items: center
}

.name {
    font-size: 13px;
    font-weight: 600;
    color: #9e9e9e;
    margin-left: 3px
}

.options {
    text-decoration: none
}

.btn-outline-primary {
    color: #0000ff;
    border-color: #0000ff
}

.btn-outline-primary:hover {
    background-color: #0000ff;
    border-color: #0000ff
}

</style>

@extends('layouts.frontend')

@section('home_content')



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">


<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css'>



<br><br><br><br>
<div class="container">
  <div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="profile-bar">
      <div class="contents">
        <img src="https://gravatar.com/avatar/cd62d88a83461e0b1daa8f2fa31c4dcb?s=512&d=https://codepen.io/assets/avatars/user-avatar-512x512-6e240cf350d2f1cc07c2bed234c3a3bb5f1b237023c204c782622e80d6b212ba.png" alt="UserAvatar">
        
         <p class="profile-name">Assalamualaikum, {{ Auth::guard('customer')->user()->name }}<!</p>
        <p class="profile-description">Welcome To {{ $company->company_name }}!</p>
        
        <div class="buttons">
          <ul>
           
            <li>
              <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();""><i class="ti-power-off"></i><span> Logout</span></a>

            <form id="logout-form" action="{{ route('customer-logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </li>
          </ul>
          
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>





               
               
   <form action="{{ route('save-customer') }}" method="POST">
    @csrf
    <input type="hidden" name="customer_id" value="{{ Auth::guard('customer')->user()->id }}">
   <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card py-5">
              <div class="inputs px-4"> <span class="text-uppercase">Name</span>
                 <input type="text" class="form-control" name="name" value="{{ Auth::guard('customer')->user()->name }}">
                </div><br>

                <div class="inputs px-4"> <span class="text-uppercase">Email</span>
                 <input type="text" class="form-control" name="email" value="{{ Auth::guard('customer')->user()->email }}">
                </div><br>

                 <div class="inputs px-4"> <span class="text-uppercase">Password</span>
                 <input type="text" class="form-control" name="password" value="{{ Auth::guard('customer')->user()->normal }}">
                </div><br>


                <div class="inputs px-4"> <span class="text-uppercase">Full Address</span>
                 <input type="text" class="form-control" name="address" value="{{ Auth::guard('customer')->user()->address }}">
                </div>
                <div class="row mt-3 g-2">

                    <div class="col-md-6">
                        <div class="inputs px-4"> <span class="text-uppercase">Phone</span> 
                          <input type="text" class="form-control" name="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                         </div>
                    </div>
                     <div class="col-md-6">
                        <div class="inputs px-4"> <span class="text-uppercase">City</span> 
                          <input type="text" class="form-control" name="city" value="{{ Auth::guard('customer')->user()->city }}">
                         </div>
                    </div>


                    </div>
                    <br>
                   <button class="btn btn-primary">Save</button>
                  
            </div>
        </div>
    </div>
</div>
</form>
 <div class="container">
      <h2>Delete Account</h2>
          
      
      
      <p>If You Want to Delete This Accout, Press this Button:
        <a href="{{ route('delete-customer', Auth::guard('customer')->user()->id ) }}" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-trash"></span> Delete Account 
        </a>
      </p> 
     
    </div>


<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>


@endsection
