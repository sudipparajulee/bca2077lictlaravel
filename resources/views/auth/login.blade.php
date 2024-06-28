<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body>
    <div class="grid grid-cols-2">
       <div class="relative">
            <a href="{{route('home')}}" class="absolute bg-blue-500 text-white px-2 py-3 m-2 rounded-lg">Go Home</a>
            <img src="https://databox.com/wp-content/themes/databox/inc/img/templates/ecommerce.jpg" alt="" class="w-full h-screen shadow-lg">
       </div>
        <div class="flex items-center justify-center w-8/12 mx-auto">
            <div class="text-center">
                <h2 class="font-bold text-2xl mb-5">Login to Ecommerce</h2>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <input type="text" class="border border-gray-300 p-2 w-full mt-4 rounded-lg" placeholder="Email" name="email">
                    <input type="password" class="border border-gray-300 p-2 w-full mt-4 rounded-lg" placeholder="Password" name="password">
                    <div class="text-right">
                        <a href="{{route('password.request')}}" class="text-blue-500 mt-4 block">Forgot Password?</a>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 w-full rounded-lg mt-2">Login</button>
                </form>
                <p class="mt-4">Don't have an account? <a href="{{route('register')}}" class="text-blue-500">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>
