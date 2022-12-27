<form method="POST" action="{{ route('authenticate') }}">
    @csrf

    <!-- Username -->
    <div>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="{{old('username')}}" required autofocus/>
        <span>{{$errors->first('username')}}</span>
    </div>

    <!-- Password -->
    <div>
        <label for="password">Password</label>
        <input id="password"
               type="password"
               name="password"
               required autocomplete="current-password"/>

        <span>{{$errors->first('password')}}</span>
    </div>

    <!-- Remember Me -->
    <div>
        <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember">
            <span>Remember me</span>
        </label>
    </div>

    <div>
        <button>Log in</button>
    </div>
</form>
