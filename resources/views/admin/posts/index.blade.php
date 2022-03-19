<x-layout>
    <section class="px-6 py-8">
        <ul class=" flex">
            <li><a href="{{ route('admin.post') }}">All News</a></li>
            <li><a href={{ route('store.post') }} class="ml-4">New News</a></li>
        </ul>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left">

                            <tbody>
                                @foreach ($posts as $post)
                                <tr class="bg-white border-b">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/post/{{ $post->slug }}">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        Published
                                    </td>
                                    <td class="text-sm text-blue-500 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/admin/posts/{{ $post->slug }}/edit">Edit</a>
                                    </td>
                                    <td class="text-sm text-blue-500 font-light px-6 py-4 whitespace-nowrap">
                                        <form method="post" action="/admin/posts/delete/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr class="bg-white border-b">
                                @endforeach ()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-layout>
