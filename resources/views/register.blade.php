<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <div>Daftar</div>
        <form method="post" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" />
            </div>
            
            <div>
                <input type="submit" value="Daftar" />
            </div>
        </form>
    </body>
</html>