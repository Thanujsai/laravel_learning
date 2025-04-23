<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job){{-- getting this jobs variable from the endpoint defined in web.php --}}
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded hover:text-[#8D6FFE]">
                <div class="font-bold text-blue-500 text-sm"><b>Employer</b> : {{$job->employer->name}}</div>
                <b>Title</b> : {{$job['title']}}, <b>Salary</b> : {{$job['salary']}}<br></br>
            </a>
        @endforeach
        <div>
            {{ $jobs->links() }} {{-- this is the pagination --}}
        </div>
    </div>
</x-layout>

<script>
    console.log('jobs page')
    console.log(@json($job))
    console.log(@json($jobs)); // now includes employer details
</script>