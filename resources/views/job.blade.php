<x-layout>{{-- this layout thing's definition is present is COmponent/layout.blade.php --}}
    <x-slot:heading>{{-- defining the variable/prop heading here in order to use it in layout --}}
        Job Listings Page
    </x-slot:heading>

    <h2><b>Title</b> : {{ $job['title'] }}</h2>{{/* this job variable is coming from the endpoint defined in web.php */}}
    <p><b>Salary</b> : {{ $job['salary'] }}</p>{{/* this salary variable is coming from the endpoint defined in web.php */}}
    @php $tagNumber = 0; @endphp
    <ul>
        @foreach ($job->tags as $tag)
            <li>
                <b>Tag {{ ++$tagNumber }}</b> : {{$tag['name']}}
            </li>
        @endforeach
    </ul>
</x-layout>

<script>
    console.log('job page');
    console.log(@json($job));
    console.log(@json($job->tags));
</script>