<?
include '../scat.php';
include '../lib/txn.php';

$txn_id= (int)$_REQUEST['txn'];
if (!$txn_id)
  die_jsonp("No transaction specified.");

$txn= txn_load($db, $txn_id);

$q= "UPDATE txn SET person = NULL WHERE id = $txn_id";
$r= $db->query($q)
  or die_query($db, $q);

$txn= txn_load_full($db, $txn_id);

echo jsonp($txn);
