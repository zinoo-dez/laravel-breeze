<form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}" required>
    </div>
    <div class="form-group">
        <label for="sorting">Sorting</label>
        <input type="number" class="form-control" id="sorting" name="sorting" value="{{ $brand->sorting }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $brand->description }}</textarea>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1" {{ $brand->is_featured ? 'checked' : '' }}>
        <label class="form-check-label" for="is_featured">Is Featured</label>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
