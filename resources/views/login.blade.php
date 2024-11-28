<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="text-white">Silakan login</div>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" value="" />
            </div>
            <div>
                <input type="submit" value="Login" />
            </div>
        </form>
    </body>
</html>