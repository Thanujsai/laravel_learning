<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job){{-- getting this jobs variable from the endpoint defined in web.php --}}
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:text-blue-700">
                    <b>Title</b> : {{$job['title']}}, <b>Salary</b> : {{$job['salary']}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>