<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h2 class="text-center font-bold text-xl">Login !</h2>
            <form method="post" action="/login">
                @csrf

                <div class="mb-6">
                    <label class="book mb-4 uppercase font-bold text-xs text-gray-700" for="email">email</label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="email" name="email" id="email"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="book mb-4 uppercase font-bold text-xs text-gray-700" for="password">password</label>
                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="password" name="password" id="password"
                        value="{{ old('password') }}"
                    />
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Login</button>
                </div>

            </form>
        </main>
    </section>

    <x-flash />

</x-layout>
