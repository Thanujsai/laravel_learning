<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    <h2><b>Title</b> : {{ $job->title}}</h2>{{-- this job variable is coming from the endpoint defined in web.php --}}
    <p><b>Salary</b> : {{ $job->salary }}</p>{{-- this salary variable is coming from the endpoint defined in web.php --}}

    
    @php $tagNumber = 0; @endphp
    <ul>
        @foreach ($job->tags as $tag)
            <li>
                <b>Tag {{ ++$tagNumber }}</b> : {{$tag['name']}}
            </li>
        @endforeach
    </ul>

    @can('edit-job',$job){{-- this means the below div should be visible only if the user has permission to edit the job --}}
    <div class="flex gap-x-6">
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>

        <p class="mt-6">
            <button form="delete-form" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete Job</button>
        </p>
    </div>
    @endcan

    <form id="delete-form" method="POST" action="/jobs/{{ $job->id }}" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>

<script>
    console.log('job page');

</script>