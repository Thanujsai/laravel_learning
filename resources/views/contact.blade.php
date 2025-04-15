<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Contact Page
    </x-slot:heading>
    <h1>Hello from the Contact page</h1>{{-- whatever i mention here inside x-layout goes to the "slot" variable in the layout file --}}
</x-layout>