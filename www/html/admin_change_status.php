<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();
$token = get_post('token');
if(is_valid_csrf_token($token) === false){
  set_error('不正な処理です');
  redirect_to(LOGIN_URL);
}
//ログインチェック
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//pdo取得
$db = get_db_connect();
//pdoを利用してログインユーザデータ取得
$user = get_login_user($db);

//管理者ユーザであるかチェック
if(is_admin($user) === false){
  //管理者でなければログインURLへ
  redirect_to(LOGIN_URL);
}
//item_idを取得
$item_id = get_post('item_id');
//公開・非公開データを取得
$changes_to = get_post('changes_to');
//公開・非公開確認
if($changes_to === 'open'){
  update_item_status($db, $item_id, ITEM_STATUS_OPEN);
  set_message('ステータスを変更しました。');
}else if($changes_to === 'close'){
  update_item_status($db, $item_id, ITEM_STATUS_CLOSE);
  set_message('ステータスを変更しました。');
}else {
  set_error('不正なリクエストです。');
}


redirect_to(ADMIN_URL);