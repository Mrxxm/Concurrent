<?php 

$pdo = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', '9511134231');
// $pdo->beginTransaction();
$sql="select `number` from  storage where id=1 limit 1 for update";
$res = $pdo->query($sql)->fetch();
$number = $res['number'];
if($number>0)
{
    $sql ="insert into `order`  VALUES (null,$number)";

    $order_id = $pdo->query($sql);
    if($order_id)
    {

        $sql="update storage set `number`=`number`-1 WHERE id = 1";
        $pdo->query($sql);
    }
}
// $pdo->commit();