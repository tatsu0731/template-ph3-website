<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ITクイズ | POSSE 初めてのWeb制作</title>
  <!-- スタイルシート読み込み -->
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css.map') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- Google Fonts読み込み -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Plus+Jakarta+Sans:wght@400;700&display=swap"
    rel="stylesheet">
  <script src="{{ asset('js/common.js') }}" defer></script>
  <script src="{{ asset('js/quiz.js') }}" defer></script>
</head>
<x-app-layout>
<body>
  <main class="l-main">
   @if (session('message'))
       <div class="text-red-600 font-bold">
        {{ session('message') }}
       </div>
   @endif
    <section class="p-hero p-quiz-hero">
      <div class="l-container">
        <h1 class="p-hero__title">
          <span class="p-hero__title__label">POSSE課題</span>
          <span class="p-hero__title__inline">{{ $quizzes->name }}</span>
        </h1>
      </div>
    </section>
    <!-- /.p-hero .p-quiz-hero -->
    <form method="post" action="{{ route('update', $quizzes) }}">
     @csrf
     @method('PATCH')
     @foreach ($quizzes->questions as $question)
    <div class="p-quiz-container l-container">
      <section class="p-quiz-box js-quiz" data-quiz=" ">
        <div class="p-quiz-box__question">
          <h2 class="p-quiz-box__question__title">
            <span class="p-quiz-box__label">Q{{ $question->id }}</span>
            <label for="text">問題文</label>
            <x-input-error :messages="$errors->get('text')" class="mt-2" />
            <input class="p-quiz-box__question__title__text" type="text" name="questions[{{ $question->id }}][text]" value="{{ old('text', $question->text) }}" size="40">
          </h2>
          <figure class="p-quiz-box__question__image">
           <img src='/img/quiz/{{ $question->image }}' alt="">
          </figure>
        </div>
        <div class="p-quiz-box__answer">
          <span class="p-quiz-box__label p-quiz-box__label--accent">A</span>
          <label for="choice">選択肢</label>
          <x-input-error :messages="$errors->get('text')" class="mt-2" />
          <ul class="p-quiz-box__answer__list">
            @foreach ($question->choices as $choice)
              <li class="p-quiz-box__answer__item">
                <input class="p-quiz-box__answer__button" data-answer="{{ $choice->is_correct }}" data-correct="" type="text" name="questions[{{ $question->id }}][choices][{{ $choice->id }}][text]" value="{{ old('text', $choice->text) }}">
              </li>
            @endforeach
          </ul>
          <div class="p-quiz-box__answer__correct js-answerBox">
            <p class="p-quiz-box__answer__correct__title js-answerTitle"></p>
            <p class="p-quiz-box__answer__correct__content">
              <span class="p-quiz-box__answer__correct__content__label">A</span>
              <span class="js-answerText"></span>
            </p>
          </div>
        </div>
        <?
          $sub = $question->supplement;
        ?>
        @if($sub)
        <cite class="p-quiz-box__note">
          <i class="u-icon__note">
            {{ $sub }}
          </i>
        </cite>
        @endif
      </section>
    <!-- ./p-quiz-box -->
    </div>
    @endforeach
    <x-primary-button class="mt-4">
     更新する
    </x-primary-button>
   </form>
   <!-- /.l-container .p-quiz-container -->
  </main>
  <footer class="l-footer p-footer">
    <div class="p-footer__copyright">
     <small lang="en">©︎2022 POSSE</small>
    </div>
  </footer>
  <!-- /.l-footer .p-footer -->

</body>
</x-app-layout>

</html>
