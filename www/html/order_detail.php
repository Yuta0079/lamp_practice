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

$order_id = get_post('order_id');
$order = get_order($db,$order_id);
if($order['user_id'] !== $user['user_id'] && is_admin($user) === false){
    redirect_to(ORDER_URL);
}
$order_details = get_order_details($db,$order_id);
//ビューの読み込み
include_once VIEW_PATH . 'order_detail_view.php';