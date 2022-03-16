@props(['comment'])
<article class="flex bg-gray-100 p-6 rounded-xl border-gray-200 mb-4">
    <div class="flex-shrink-0"><img src="https://i.pravatar.cc/100" alt="" width="100px" /></div>
    <div class="ml-4">
        <header class="">
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-xs">Posted <time>8 Months ago</time></p>
        </header>
        <p>
          {!! $comment->body !!}
        </p>
    </div>
</article>
