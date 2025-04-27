@props(['name'])
@error($name){{--we know that an error occured if title is left null or title has less than 3 characters from the validations we mentioned in web.php  --}}
    <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
@enderror