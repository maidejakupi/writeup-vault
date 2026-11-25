<div {{ $attributes }}>
    <a href="{{ route('writeups.index') }}" class="hover:text-green-200">browse</a>

    @auth
        <a href="{{ route('dashboard') }}" class="hover:text-green-200">dashboard</a>
        <a href="{{ route('writeups.create') }}" class="hover:text-green-200">+ new writeup</a>
        <a href="{{ route('profile.edit') }}" class="text-green-600 hover:text-green-200">{{ auth()->user()->name }}</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:text-green-200">logout</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="hover:text-green-200">login</a>
        <a href="{{ route('register') }}" class="hover:text-green-200">register</a>
    @endguest
</div>
