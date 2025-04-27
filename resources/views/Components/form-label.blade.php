<label {{ $attributes->merge(['class' => "block text-sm/6 font-medium text-gray-900"]) }}>{{ $slot }}</label>



{{-- 
    <x-form-label for="title">Title</x-form-label>
    👉 The word Title is the slot content.
    So when rendering:

$slot = "Title"
the above line is similar to <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>

Term	        Meaning
$attributes	    Additional HTML attributes passed into the component (like for="title")
$slot	        The inside text/content you write between the component tags (Title)
--}}
