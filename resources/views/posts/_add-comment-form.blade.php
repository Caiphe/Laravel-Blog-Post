@auth
    <form method="post" action="/posts/{{ $post->slug }}/comments" class="border border-gray-200 p-6 rounded-xl mb-6">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/40?={{ auth()->id() }}" alt="" width="40px" class="rounded-full" />
            <h2 class="ml-5">Leave a comment</h2>
        </header>

        <textarea class="w-full mt-4 border border-gray-200" name="body" cols="30" rows="5" style="font-size: 13px;"></textarea>
        @error('body')
            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
        @enderror
        <button type="submit"
            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl mt-3">POST</button>

    </form>
@else
    <p class="mb-5 font-semibold">
        <a class="underline" href="{{ route('user.register') }}">Register</a> or
        <a class="mb-5 underline" href="{{ route('user.login') }}">Log In </a>
        to participate
    </p>
@endauth
