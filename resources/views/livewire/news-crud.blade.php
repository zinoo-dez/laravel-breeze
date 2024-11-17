<div>
    {{ $news->links() }}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <button wire:click="create()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New
                    News</button>

                <!-- Modal/Popup -->
                <div class="fixed inset-0 z-50 overflow-y-auto" style="display: {{ $isOpen ? 'block' : 'none' }}">
                    <div
                        class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                        {{ isset($news_id) ? 'Edit News' : 'Create News' }}
                                    </h3>
                                    <div class="mt-2">
                                        <form>
                                            <div class="mb-4">
                                                <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User:<span class="text-red-500">*</span></label>
                                                <select wire:model.defer="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                    <option value="">Select User</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="news_category_id" class="block text-gray-700 text-sm font-bold mb-2">News Category:<span class="text-red-500">*</span></label>
                                                <select wire:model.defer="news_category_id" id="news_category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($newsCategories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('news_category_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="title" wire:model.defer="title">
                                                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="content" wire:model.defer="content"></textarea>
                                                @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:<span class="text-red-500">*</span></label>
                                                <select wire:model.defer="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                                    <option value="">Select Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                                @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="is_featured" class="block text-gray-700 text-sm font-bold mb-2">Featured:</label>
                                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                                    id="is_featured" wire:model.defer="is_featured">
                                                @error('is_featured') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button wire:click.prevent="store()"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Save
                                </button>
                                <button wire:click="closeModal()"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Content</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Featured</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr wire:key="news-{{ $item->id }}">
                                <td class="border px-4 py-2">{{ $item->id }}</td>
                                <td class="border px-4 py-2">{{ $item->title }}</td>
                                <td class="border px-4 py-2">{{ $item->newscategory->name ?? 'No Category' }}</td>
                                <td class="border px-4 py-2">{{ Str::limit($item->content, 50) }}</td>
                                <td class="border px-4 py-2">{{ $item->status }}</td>
                                <td class="border px-4 py-2">{{ $item->is_featured ? 'Yes' : 'No' }}</td>
                                <td class="border px-4 py-2">
                                    <button wire:click="edit({{ $item->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button wire:click="delete({{ $item->id }})"
                                        onclick="return confirm('Are you sure you want to delete this news?') || event.stopImmediatePropagation()"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
