<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Posts Page
    </x-slot:heading>

    <ul>
        @foreach ($posts as $post){{-- getting this posts variable from the endpoint defined in web.php --}}
            <li>
                <a href="/posts/{{ $post['id'] }}" class="text-blue-500 hover:text-blue-700">
                    <b>Title</b> : {{$post['title']}}, <b>Description</b> : {{$post['description']}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>