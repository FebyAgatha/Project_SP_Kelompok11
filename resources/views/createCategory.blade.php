<x-app-layout>

    <h1 class="my-3 text-3xl font-black text-center">NEW CATEGORY</h1>

    <form action = "/store-category" method = "POST" class="mt-5 px-5">
        @csrf
        <div>
            <x-label for="name" value="{{ __('Add Book Category:') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete=off/>

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <x-button class="ms-4 mt-4" type="submit">
            {{ __('Submit') }}
        </x-button>
    </form>

</x-app-layout>
