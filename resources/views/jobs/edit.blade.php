<x-layout>
    <x-slot:heading>
        Edit Job : {{ $job->title }}{{-- this job variable is coming from the endpoint defined in web.php --}}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}" class="space-y-12">{{-- this is the form for creating a new job, after submitting the form it make a post request to /jobs ---}}
        @csrf
        {{-- this is a blade directive for CSRF token, it is used to protect against cross-site request forgery attacks --}}
        @method('PATCH') {{-- this is a blade directive for method spoofing, it is used to make a PATCH request instead of POST, we dont have a PATCH request natively in laravel, there it goes to patch request instead of the post one --}}

        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                        placeholder="Shift Leader" 
                        value="{{ $job->title }}" {{-- this job variable is coming from the endpoint defined in web.php, since this is an edit page the default value in the text input should be the present value of the field --}}
                        required>{{-- required is used to make the field mandatory, for client side validation --}}
                  </div>

                  @error('title'){{--we know that an error occured if title is left null or title has less than 3 characters from the validations we mentioned in web.php  --}}
                    <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="sm:col-span-4">
                <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input 
                        type="text" 
                        name="salary" 
                        id="salary" 
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                        placeholder="$450,000 Per Year" 
                        value="{{ $job->salary }}" {{-- this job variable is coming from the endpoint defined in web.php --}}
                        required>{{-- required is used to make the field mandatory, for client side validation --}}
                  </div>
                  @error('salary'){{--we know that an error occured if title is left null or salary isn't a from the validations we mentioned in web.php  --}}
                    <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              {{-- <div class="mt-10">
                @if($errors->any()) 
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li class="text-red-500 italic text-sm/6">{{ $error }}</li>
                    @endforeach
                  </ul>
                @endif
              </div> --}}
      
          </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/jobs" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
      </form>
      
</x-layout>