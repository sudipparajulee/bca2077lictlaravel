<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="bg-amber-600 p-2 flex text-white justify-between items-center px-24">
        <h2 class="font-bold text-3xl">DARAZ</h2>
        <div class="flex gap-10">
            <a href="{{route('home')}}">Home</a>
            @php $categories = \App\Models\Category::orderBy('priority')->get(); @endphp
            @foreach($categories as $category)
            <a href="{{route('categoryproducts',$category->id)}}">{{$category->name}}</a>
            @endforeach

            @auth
            <a href="">Hi, {{auth()->user()->name}}</a>
            <form action="{{route('logout')}}" method="post" class="inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @else
            <a href="/login">Login</a>
            @endauth
        </div>
    </nav>

    @yield('content')


    <footer class="bg-amber-600 p-2 text-white text-center">
        <p>&copy; 2024 Daraz</p>
    </footer>
</body>
</html>
