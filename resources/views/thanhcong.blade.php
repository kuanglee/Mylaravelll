@if(Auth::check())
<h1>Dang nhap thanh cong</h1>
      @if(isset($user))
        {{"Ten :" .$user->name}}
        </br>
        {{"Email: " . $user->email}}
        <a href="{{url('/logout')}}">Logout</a>
        @endif
        @else
  <h1>{{"Ban Chua Dang Nhap"}}</h1>
@endif
<!-- @if(Auth::check())
  <h1>Dang nhap thanh cong </h1>
  @if(isset($user))
      {{"name : " . $user->name}}
      <br>
      {{"Email :" . $user->email}}
      <a href="{{url('logout')}}">Logout</a>
  @endif
  @else
  <h1>{{"chua dang nhap"}}</h1>
@endif -->
