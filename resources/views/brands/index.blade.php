<h1 class="text-3xl font-bold mb-6">Hello Brand</h1>
<a href="{{ route('brands.create') }}">Create</a>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($brands as $brand)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $brand->name }}</h2>
                <p class="text-gray-600">
                    {{ $brand->description }}
                </p>
                <a href="{{ route('brands.edit', $brand->id) }}"
                    class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="inline-block mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this brand?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
