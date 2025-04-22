<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job){{-- getting this jobs variable from the endpoint defined in web.php --}}
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded hover:text-blue-500">
                <b>Title</b> : {{$job['title']}}, <b>Salary</b> : {{$job['salary']}}
            </a>
        @endforeach
    </div>
</x-layout>