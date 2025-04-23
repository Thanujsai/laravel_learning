<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Posts Page
    </x-slot:heading>

    <div class='space-y-4'>
        @foreach ($posts as $post){{-- getting this posts variable from the endpoint defined in web.php --}}
            <a href="/posts/{{ $post['id'] }}" class="block px-4 py-6 border border-gray-200 rounded hover:text-blue-500">
                <b>Title</b> : {{$post['title']}}, <b>Description</b> : {{$post['description']}}<br></br>
            </a>
        @endforeach
    </ul>
</x-layout>