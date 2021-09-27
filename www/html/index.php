<?php
//定義ファイルを読み込み
require_once '../conf/const.php';
//汎用関数を読み込み
require_once MODEL_PATH . 'functions.php';
//userデータ関数を読み込み
require_once MODEL_PATH . 'user.php';
//itemデータ関数を読み込み
require_once MODEL_PATH . 'item.php';

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
//pdoを使って商品一覧用のアイテム取得
$items = get_open_items($db);
//トークンを生成
$token = get_csrf_token();
//ビューの読み込み
include_once VIEW_PATH . 'index_view.php';