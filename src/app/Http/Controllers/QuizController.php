<?php

namespace App\Http\Controllers;

use App\Models\choices;
use App\Models\questions;
use App\Models\Quizzes;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // 一覧表示のためのメソッド
    public function quiz() {
        // $quizzes = quizzes::all();
        $quizzes = Quizzes::paginate(20);
        // $questions = questions::all();
        // $choices = choices::all();
        return view('quiz', compact('quizzes'));
    }

    // タイトル編集用のメソッド
    public function quizzes_title(Quizzes $quizzes) {
        // $quizzes = quizzes::all();
        $quizzes = Quizzes::all()->find($quizzes);
        // $questions = questions::all();
        // $choices = choices::all();
        return view('quizzesTitle', compact('quizzes'));
    }
    public function quizzes_title_update(Request $request, Quizzes $quizzes) {
        $request->validate([
            'name' => 'required|max:40',
        ]);
        $quizzes->update([
            'name' => $request->name,
        ]);
        return redirect()->route('quizzes');
    }
    // 個別表示のためのメソッド旧_1
    // public function show (Quizzes $quizzes) {
    //     $quizzes = quizzes::with('questions')->get();
    //     $questions = questions::with('choices')->get();
    //     return view('quizzes', compact('quizzes', 'questions'));
    // }
    // 個別表示のためのメソッド旧_2
    public function show ($quizzes) {
        $quizzes = Quizzes::with('questions.choices')->find($quizzes);

        if(!$quizzes) {
            abort(404);
        }

        return view('quizzes', compact('quizzes'));
    }
    // 個別表示のためのメソッド新
    // public function show (Quizzes $quizzes) {
    //     $quizzes = quizzes::with('questions', 'choices')->get();
    //     return view('quizzes', compact('quizzes'));
    // }
    // 編集用のメソッド
    public function edit($quizzes) {
        $quizzes = Quizzes::with('questions.choices')->find($quizzes);

        if(!$quizzes) {
            abort(404);
        }

        return view('edit', compact('quizzes'));
    }
    // 更新用のメソッド
    public function update(Request $request, $quizzes) {
        $quizzes = Quizzes::with('questions.choices')->find($quizzes);
        if(!$quizzes) {
            abort(404);
        }
    
        $validated = $request->validate([
            'questions.*.text' => 'required|max:40',
            'questions.*.choices.*.text' => 'required|max:40',
        ]);
    
        // foreach ($validated['questions'] as $questionData) {
        //     $question = $quizzes->questions->where('id', $questionData['id'])->first();
        //     if ($question) {
        //         $question->update(['text' => $questionData['text']]);
        //         foreach ($questionData['choices'] as $choiceData) {
        //             $choice = $question->choices->where('id', $choiceData['id'])->first();
        //             if ($choice) {
        //                 $choice->update(['text' => $choiceData['text']]);
        //             }
        //         }
        //     }
        // }
        

        $quizzes->update($validated);
        session()->flash('message', '更新しました');
        return redirect('quiz');
    }
    

    // 保存用のメソッド
    public function store(Request $request) {

        $quizzes = Quizzes::create([
            'name' => $request->name
        ]);

        $questions = Questions::create([
            // 'image' => $request->image,
            'text' => $request->text,
            // 'supplement' => $request->supplement
        ]);

        $choices = Choices::create([
            'text' => $request->text,
            // 'is_correct' => $request->is_correct
        ]);

        return back();
    }

    public function delete( Request $request, Quizzes $quizzes) {
        $quizzes->delete();
        $request->session()->flash('message', '削除しました');
        return redirect('quiz');
    }
}