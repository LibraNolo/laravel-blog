<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 border-b border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Create a New Blog Post</h3>
                    <form action="{{ route('blogs.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-300">Blog Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-300">Author</label>
                            <input type="text" name="author" id="author" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-300">Blog Content</label>
                            <textarea name="content" id="content" rows="4" class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 text-white focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Create Blog Post
                            </button>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="mt-4 p-4 bg-blue-600 text-white rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mt-4 p-4 bg-red-600 text-white rounded-md">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="text-lg font-semibold text-white mt-8 mb-4">Your Blog Posts</h3>
                    <div class="space-y-4">
                        @foreach($blogs as $blog)
                            <div class="bg-gray-700 p-4 rounded-md">
                                <h4 class="text-lg font-semibold text-white">{{ $blog->title }}</h4>
                                <p class="text-gray-300">By: {{ $blog->author }}</p>
                                <p class="text-gray-400 mt-2">{{ Str::limit($blog->content, 100) }}</p>
                                <div class="mt-4 space-x-2">
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Edit
                                    </a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this blog post?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>