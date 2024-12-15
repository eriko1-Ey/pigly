<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PiglyController extends Controller
{

    //ログイン画面表示
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('index'); // ログイン済みなら管理画面へ
        }
        return view('auth.login'); // 未ログインならログイン画面
    }





    //*アカウント作成処理*//
    public function postRegister(RegisterStep1Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 自動ログイン
        Auth::login($user);

        // 新規体重登録画面にリダイレクト（GETリクエスト）
        return redirect()->route('register.step2.get');
    }

    public function showRegisterStep2()
    {
        return view('new');
    }

    //新規体重登録画面
    public function createRegister(RegisterStep2Request $request)
    {
        // 現在のユーザー（前のステップで登録されたユーザー）
        $user = User::find(auth()->id()); // 認証されたユーザーを取得

        // 目標体重を保存
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        // 現在の体重を保存
        WeightLog::create([
            'user_id' => $user->id,
            'date' => now(), // 現在の日付を登録
            'weight' => $request->weight,
            'calories' => 0, // 初期値（任意で変更可能）
            'exercise_time' => '00:00:00', // 初期値（任意で変更可能）
            'exercise_content' => '', // 初期値（任意で変更可能）
        ]);

        // 管理画面にリダイレクト
        return redirect()->route('index');
    }


    public function showAdmin(Request $request)
    {
        $user = Auth::user();  // 現在ログイン中のユーザーを取得

        // ユーザーの全体重データを日付順で取得
        $weightLogs = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->paginate(10); // ページネーションを追加


        $weightTarget = $user->weightTarget; // リレーション名を修正
        $targetWeightValue = $weightTarget ? $weightTarget->target_weight : '未登録';

        return view('admin', [
            'user' => $user,
            'weight_logs' => $weightLogs, // 全体重データ
            'target_weight' => $targetWeightValue, // 明示的にチェック済みの値を渡す
        ]);
    }
}
