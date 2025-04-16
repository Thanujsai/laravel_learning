<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Home Page
    </x-slot:heading>
    {{-- <h1>{{ $greeting }} from the welcome page,  {{$name}}</h1>I'll have access to this variable name from web.php --}}
</x-layout>