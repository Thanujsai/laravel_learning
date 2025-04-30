<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <form method="POST" action="/login" class="space-y-12">{{-- this is the form for creating a new job, after submitting the form it make a post request to /jobs ---}}
        @csrf 
        {{-- this is a blade directive for CSRF token, it is used to protect against cross-site request forgery attacks --}}
        <div class="space-y-12 gap-3">
          <div class="border-b border-gray-900/10 pb-12">
              <x-form-field>
                <x-form-label for="email">Email</x-form-label>
                <div class="mt-2">
                  <x-form-input name="email" id="email" type="email" :value="old('email')" required />{{-- we are binding the value old('email') to an expression, not a string --}}

                  <x-form-error name="email" />
                </div>
              </x-form-field>

              <x-form-field>
                <x-form-label for="password">Password</x-form-label>
                <div class="mt-2">
                  <x-form-input name="password" id="password" type="password" required />

                  <x-form-error name="password" />
                </div>
              </x-form-field>
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
          <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <x-form-button>Login</x-form-button>
        </div>
      </form>
      
</x-layout>