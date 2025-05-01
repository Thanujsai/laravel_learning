<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-gray-100 h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="">
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img class="size-8" src="https://laracasts.com/images/logo/logo-triangle.svg" alt="Your Company">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/" :active="request()->is('/')" id="home">Home</x-nav-link>
                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                <x-nav-link href="/posts" :active="request()->is('posts')">Posts</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link><!--prefixing a name with a colon means that the value should be interpreted as a value or expression, not as a string-->
              </div>
            </div>
          </div> 
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              @guest<!-- if you are a guest of the application then only display these things, if you're logged in dont display these things -->
                <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                <x-nav-link href="/register" class="ml-4" :active="request()->is('register')">Register</x-nav-link>
              @endguest

              @auth<!-- if you are a user/authenticated of the application then only display these things, if you're logged out dont display these things -->
                <form method="POST" action="/logout">
                  @csrf
                  <x-form-button>Log Out</x-form-button>
                </form>
              @endauth
            </div>
          </div>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
          <a href="/jobs" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Jobs</a>
          <a href="/posts" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Posts</a>
          <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
        </div>
      </div>
    </nav>
  
    <header class="bg-white shadow-sm">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>

        <x-button href="/jobs/create" >Create Job</x-button>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }} {{-- this slot variable is the content that i put inside the x-layout tag in the other file which uses this layout --}}
      </div>
    </main>
  </div>
  
    </body>
</html>