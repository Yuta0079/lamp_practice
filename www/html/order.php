<?php
//定義ファイルを読み込み
require_once '../conf/const.php';
//汎用関数を読み込み
require_once MODEL_PATH . 'functions.php';
//userデータ関数を読み込み
require_once MODEL_PATH . 'user.php';
//cartデータ関数を読み込み
require_once MODEL_PATH . 'cart.php';

//ログインチェックのセッションをスタート
session_start();

//ログインチェック用関数を利用
if(is_logined() === false){
  //ログインしていなければログイン画面へ
  redirect_to(LOGIN_URL);
}

//pdo取得
$db = get_db_connect();
//pdoを使ってログインユーザデータを取得
$user = get_login_user($db);
//トークンを生成
$token = get_csrf_token();

//登録チェック
if(is_admin($user) === false){
    //明細呼び出し
    $orders = get_orders($db,$user['user_id']);
  }else{
//全明細呼び出し
$orders = get_orders_all($db);
  }

//ビューの読み込み
include_once VIEW_PATH . 'order_view.php';