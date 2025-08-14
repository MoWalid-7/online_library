<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    
    <div class="min-h-screen flex flex-col justify-center items-center" style="width:60%; height: 400px; margin:auto; background-color: #ccc; text-align:center;border-radius:10px;padding: 20px; " >
        <h1 class="text-4xl font-bold mb-6">Welcome to Online Library</h1>
        <p class="mb-6 text-gray-700">Manage your books and track borrowed books easily.</p>

        
        <div class="mt-6 text-gray-600">
            <p>If you are an admin, please use your credentials to login.</p>
        </div>
        <div class="flex gap-4" style="width: 90%">
            <a href="{{ route('login') }}"  style="text-decoration:none;width:80%;background-color: black;color:#fff;padding: 10px;border-radius:5px">Login</a>
            <a href="{{ route('register') }}" style="text-decoration:none;width:80%;background-color: #0069d2ff;color:#fff;padding: 10px;border-radius:5px" >Register</a>
        </div>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
