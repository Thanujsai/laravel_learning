<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    <h2><b>Title</b> : {{ $post['title'] }}</h2>
    <p><b>Description</b> : {{ $post['description'] }}</p>
</x-layout>