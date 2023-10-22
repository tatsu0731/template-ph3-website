@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- @include('layouts.navigation') --}}
<div class="mx-auto px-6">
  @if (session('message'))
      <div class="text-red-600 font-bold">
        {{ session('message') }}
      </div>
  @endif
  <x-app-layout>
   <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
     クイズ名変更
    </h2>
   </x-slot>
   <div class="max-w-7xl mx-auto px-6">
    <div class="bg-white w-full rounded-2xl">

     <form method="post" action="{{ route('title_update', $quizzes) }}">
      @csrf
      @method('patch')
     <div class="mt-4 p-4">
      <label for="name" class="text-lg font-semibold">クイズ名：</label>
      <input type="text" size="20" name="name" value="{{ $quizzes->name }}" class="text-lg font-semibold">
      <hr class="w-full">
      <div class="text-sm font-semibold flex flex-row-reverse">
       <p>{{ $quizzes->created_at }}</p>
      </div>
      <button type="submit" class="">Update</button>
     </div>
     </form>

    </div>
   </div>
  </x-app-layout>
  {{-- <div class="mb-4">
    {{ $quizzes->links() }}
  </div> --}}
</div>