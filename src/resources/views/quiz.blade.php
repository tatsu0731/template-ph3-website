@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('layouts.navigation')
<div class="mx-auto px-6">
  @if (session('message'))
      <div class="text-red-600 font-bold">
        {{ session('message') }}
      </div>
  @endif
  @foreach ($quizzes as $quiz)
      <div class="mt-4 p-8 bg-white w-full rounded-2xl">
        <h1 class="p-4 text-lg font-semibold">
          <a href="{{ route('quizzes', $quiz->id) }}" class="text-blue-600">
          {{ $quiz->name }}
          </a>
        </h1>
        @can('edit_btn')
        <div class="text-right flex">

          <a href="{{ route('title', $quiz) }}" class="flex-1">
            <x-primary-button class="bg-blue-700 ml-2">
              タイトル修正
            </x-primary-button>
          </a>

          <a href="{{ route('edit', $quiz) }}" class="flex-1">
            <x-primary-button>
              編集
            </x-primary-button>
          </a>

          <form method="post" action="{{ route('destroy', $quiz->id) }}" class="flex-2">
            @csrf
            @method('delete')
            <x-primary-button class="bg-red-700 ml-2">
              削除
            </x-primary-button>
          </form>
        </div>
        @endcan
        <hr class="w-full">
        {{-- <p class="mt-4 p-4">
          {{ $quiz->body }}
        </p>
        <div class="p-4 text-sm font-semibold">
          <p>
            {{ $ }}
          </p>
        </div> --}}
      </div>
  @endforeach
  <div class="mb-4">
    {{ $quizzes->links() }}
  </div>
</div>