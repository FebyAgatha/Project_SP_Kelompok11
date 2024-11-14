<x-app-layout>
    <div class="flex flex-col justify-center items-center">
        <h1 class="font-black text-3xl text-center mt-7 mb-7">USERS</h1>
        <div class="flex flex-wrap gap-5 justify-center mt-7">
            @foreach($users as $user)
            @if (!$user->is_admin)
                <div class="border-2 border-[#555] rounded-xl bg-[#ccc] p-2 w-72 flex-col flex justify-center items-center">
                    <div class="px-2 py-1 w-full flex justify-between items-center gap-3">
                        <h4 class="text-xl font-black truncate">{{ $user['name'] }}</h4>
                        <form action="{{route('delete.user')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="bg-[#952020] py-1 px-2 rounded-lg text-white" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger btn-" >Delete</button>
                        </form>
                    </div>
                    <div class="px-2 py-1 w-full">
                        <h4 class="text-sm font-semibold truncate">{{ $user['address'] }}</h4>
                        <h4 class="text-sm font-semibold">{{ $user['phonenum'] }}</h4>
                        <h4 class="text-sm font-semibold">{{ $user['postalcode'] }}</h4>
                    </div>
                </div>
            @endif
            
            @endforeach
        </div>
    </div>
</x-app-layout>
