<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h2 class="text-center font-bold text-xl mb-5"> Post Edit</h2>
            <form method="post" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-6">
                    <label class="book mb-4 uppercase font-bold text-xs text-gray-700" for="title">Title</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                        value="{{ $post->title }}" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="book mb-4 uppercase font-bold text-xs text-gray-700" for="excerpt">Excerpt</label>
                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt"
                        value="{{ old( $post->excerpt) }}">{!! $post->excerpt !!}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="book mb-4 uppercase font-bold text-xs text-gray-700" for="body">Body</label>
                    <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body"
                        value="{{ $post->body }}">{!! $post->excerpt !!}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="book mb-4 uppercase font-bold text-xs text-gray-700"
                        for="category_id">Category</label>

                    <select class="border border-gray-400 p-2 w-full" type="text" name="category_id" id="category_id">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id'), $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="book mb-4 uppercase font-bold text-xs text-gray-700" for="thumbnail">Thumbnail</label>
                    <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail"
                        value="{{ old('thumbnail') }}" />

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Update</button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
