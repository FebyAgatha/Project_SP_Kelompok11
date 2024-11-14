<x-app-layout>
    <div class="flex flex-col justify-center items-center">
        <h1 class="font-black text-3xl text-center mt-7 mb-2">CATEGORIES</h1>
        <a class="bg-[#206113] py-2 px-3 rounded-lg mb-4 text-white w-52 text-center" href="/create-category">Add categories</a>
        <div class="flex flex-wrap gap-5 justify-center">
            @foreach($categories as $category)
            <div class="border-2 border-[#555] rounded-xl bg-[#ccc] p-2 w-32 h-32 flex-col flex flex-wrap justify-center items-center gap-3">
                <h4 class="text-center text-md font-bold">{{ $category['name'] }}</h4>
                <form action="{{route('delete.category')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <button type="submit" class="bg-[#952020] py-1 px-2 rounded-lg text-white" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger btn-" >Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
