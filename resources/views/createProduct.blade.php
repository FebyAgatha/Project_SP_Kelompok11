<x-app-layout>

    <h1 class="my-3 text-3xl font-black text-center">Create New Product</h1>
    <x-validation-errors class="mb-4" />

    <form action="/store-product" method="POST" enctype="multipart/form-data" class="p-5">
        @csrf
        <div>
            <label for="category">Category</label>
            <select type="text" class="form-select" id="name" aria-describedby="emailHelp" name = "category_id" value = "{{ old('category_id')}}">
            <option selected>Open this Select Menu</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>

            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-label for="name" value="{{ __('Product Name') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete=off/>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-label for="price" value="{{ __('Product Price') }}" />
            <x-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{old('price')}}" required autofocus autocomplete=off/>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-label for="amount" value="{{ __('Product Amount') }}" />
            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" value="{{old('amount')}}" required autofocus autocomplete=off/>
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="exampleInputPassword1" class="form-label">Product Image</label><br>
            <input type="file" class="form-control mt-2" id="exampleInputPassword1" name = "image" value = "{{ old("image") }}" accept=".jpg, .jpeg, .png">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-[#0e1768] px-5 py-1 text-white rounded-md ml-2 mt-2">Submit</button>
    </form>

</x-app-layout>
