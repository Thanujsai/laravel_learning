<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    <h2><b>Title</b> : {{ $job['title'] }}</h2>
    <p><b>Salary</b> : {{ $job['salary'] }}</p>
</x-layout>