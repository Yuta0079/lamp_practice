<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細履歴</h1>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($order) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php print ($order['order_id']); ?></td>
            <td><?php print($order['order_date']); ?></td>
            <td><?php print($order['total']); ?></td>
          </tr>
        </tbody>
      </table>
    <?php } ?> 
  </div>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($order_details) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>購入時の商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($order_details as $order_details){ ?>
          <tr>
            <td><?php print h($order_details['name']); ?></td>
            <td><?php print($order_details['price']); ?></td>
            <td><?php print($order_details['amount']); ?></td>
            <td><?php print($order_details['amount']*$order_details['price']); ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?> 
  </div>
</body>
</html>