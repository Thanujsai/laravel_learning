<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    @foreach ($jobs as $job){{-- getting this jobs variable from the endpoint defined in web.php --}}
        <li><b>Title</b> : {{$job['title']}}, <b>Salary</b> : {{$job['salary']}}</li>
    @endforeach
</x-layout>