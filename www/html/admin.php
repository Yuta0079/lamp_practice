<?php
//定義ファイル
require_once '../conf/const.php';
//汎用関数
require_once MODEL_PATH . 'functions.php';
//userデータ関数
require_once MODEL_PATH . 'user.php';
//itemデータ関数
require_once MODEL_PATH . 'item.php';

//ログインチェック
session_start();
//ログインチェック関数利用
if(is_logined() === false){
  //ログインしていなければログイン画面
  redirect_to(LOGIN_URL);
}
//pdo取得
$db = get_db_connect();
//pdoを使ってログインユーザデータ取得
$user = get_login_user($db);

//登録チェック
if(is_admin($user) === false){
  //登録がなければログイン画面へ
  redirect_to(LOGIN_URL);
}
//pdoを利用して一覧表示
$items = get_all_items($db);
//トークンを生成
$token = get_csrf_token();
//開いていなければadmin_view.phpより取得
include_once VIEW_PATH . '/admin_view.php';
