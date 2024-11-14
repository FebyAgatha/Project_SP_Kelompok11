<x-app-layout>
    <h1 class="mt-3 mb-3 text-3xl font-black text-center">UPDATE PRODUCT</h1>
    <x-validation-errors class="mb-4" />

    <form action="/update-product/{{ $product->id }}" method="POST" enctype="multipart/form-data" class="p-5">
        @csrf
        @method('PATCH')

        <div>
          <label for="category">Category</label>
          <select type="text" class="form-select" id="name" aria-describedby="emailHelp" name = "category_id">
          <option selected>Open this Select Menu</option>
          @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}</option>
          @endforeach
          </select>

          @error('category')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div>
            <x-label for="name" value="{{ __('Product Name') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name', $product->name)}}" required autofocus autocomplete=off/>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-label for="price" value="{{ __('Product Price') }}" />
            <x-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{old('price', $product->price)}}" required autofocus autocomplete=off/>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-label for="amount" value="{{ __('Product Amount') }}" />
            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" value="{{old('amount', $product->amount)}}" required autofocus autocomplete=off/>
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 mt-3">
            <label for="exampleInputPassword1" class="form-label">Product Image</label><br>
            @if($product->image)
                <img id="imagePreview" src="{{ asset('/storage/products/' . $product->image) }}" alt="Product Image" class="w-56">
            @endif
            <input type="file" class="form-control mt-2" id="exampleInputPassword1" name = "image" onchange="previewImage(event)" accept=".jpg, .jpeg, .png">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-[#0e1768] px-5 py-1 text-white rounded-md ml-2 mt-2">Submit</button>
    </form>

    @push('scripts')
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = URL.createObjectURL(event.target.files[0]);
            imagePreview.onload = () => URL.revokeObjectURL(imagePreview.src);
        }
    </script>
    @endpush

</x-app-layout>
