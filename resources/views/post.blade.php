<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Post Listings Page
    </x-slot:heading>

    <h2><b>Title</b> : {{ $post['title'] }}</h2>
    <p><b>Description</b> : {{ $post['description'] }}</p>
    @php $tagNumber = 0; @endphp
    <ul>
        @foreach ($post->tags as $tag)
            <li>
                <b>Tag {{ ++$tagNumber }}</b> : {{$tag['name']}}
            </li>
        @endforeach
    </ul>
</x-layout>