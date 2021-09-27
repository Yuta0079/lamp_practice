<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';

//ログイン確認
session_start();

//ログイン関数で確認処理
if(is_logined() === true){
  //ログインできれいればホーム画面へ
  redirect_to(HOME_URL);
}
//トークンを生成
$token = get_csrf_token();
//ログイン項目をビュー表示
include_once VIEW_PATH . 'login_view.php';