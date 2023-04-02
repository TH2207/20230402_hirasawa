<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\EvaluateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ミドルウェア(ログイン)
Route::group(['middleware' => ['login']], function () {

    //店舗予約完了画面
    Route::get('/done', [ReserveController::class, "done"])->name("reserve.done");

    //マイページ画面
    Route::get('/mypage', [ReserveController::class, "mypage"])->name("reserve.mypage");

    //店舗予約
    Route::post('/reserve_add', [ReserveController::class, "reserve"])->name("reserve.add");

    //マイページ画面から店舗予約キャンセル
    Route::post('/mypage_reserve_cancel', [ReserveController::class, "mypage_reserve_cancel"])->name("reserve.mypage_cancel");

    //マイページ画面から店舗予約変更画面
    Route::get('/reschedule', [ReserveController::class, "reschedule"])->name("reserve.reschedule");
    Route::post('/reschedule', [ReserveController::class, "reschedule"])->name("reserve.reschedule");

    //店舗予約変更
    Route::post('/update', [ReserveController::class, "update"])->name("reserve.update");

    //店舗予約変更完了画面
    Route::get('/change', [ReserveController::class, "change"])->name("reserve.change");

    //マイページ画面からお気に入り店舗除外
    Route::post('/mypage_favorite_remove', [FavoriteController::class, "mypage_favorite_remove"])->name("favorite.mypage_remove");

    //検索一覧画面からお気に入り店舗追加
    Route::post('/index_favorite_add', [FavoriteController::class, "index_favorite_add"])->name("favorite.index_add");

    //検索一覧画面からお気に入り店舗除外
    Route::post('/index_favorite_remove', [FavoriteController::class, "index_favorite_remove"])->name("favorite.index_remove");

    //予約idを取得して評価コメント画面に遷移
    Route::get('/evaluate', [EvaluateController::class, "evaluate"])->name("evaluate.move");
    Route::post('/evaluate', [EvaluateController::class, "evaluate"])->name("evaluate.move");

    //評価コメント追加
    Route::post('/score', [EvaluateController::class, "score"])->name("evaluate.score");

    //評価コメント完了画面
    Route::get('/finish', [EvaluateController::class, "finish"])->name("evaluate.finish");
});

//検索一覧画面表示
Route::get('/', [ReserveController::class, 'show'])->name('reserve.show');

//店舗詳細画面表示
Route::get('/detail/{shop_id?}', [ReserveController::class, 'detail'])->name('reserve.detail');

//メニューボタンから検索一覧表示
Route::get('/menu', [ReserveController::class, 'menu'])->name('reserve.menu');

//セッション保持の検索条件から検索一覧画面表示
Route::post('/', [ReserveController::class, 'search'])->name('reserve.search');

//店舗idを取得して店舗詳細画面に遷移
Route::post('/detail_move', [ReserveController::class, "detail_move"])->name("reserve.detail_move");

//セッション保持した前ページに移動
Route::post('/back', [ReserveController::class, "back"])->name("reserve.back");

//ログイン画面表示
Route::get('/login', [LoginController::class, 'create'])->name('login.create');

//ログイン処理
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

//ログアウト処理
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

//ユーザー登録画面表示
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');

//ユーザー登録処理
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//ユーザー登録完了画面
Route::get('/thanks', [RegisterController::class, "thanks"])->name("register.thanks");
