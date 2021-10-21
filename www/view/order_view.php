<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($orders) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>注文日</th>
            <th>該当の注文の合計金額</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($orders as $orders){ ?>
          <tr>
            <td><?php print h($orders['order_id']); ?></td>
            <td><?php print($orders['order_date']); ?></td>
            <td><?php print($orders['total']); ?>
            <form method="post" action="order_detail.php">
        <input class="btn btn-block btn-primary" type="submit" value="購入明細表示">
        <input type="hidden" name="token" value ="<?php print $token ?>">
        <input type="hidden" name="order_id" value ="<?php print $orders['order_id'] ?>">
      </form></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?> 
  </div>
</body>
</html>