<?php
function type($row){
  switch ($row) {
    case '1food':
      $typeName = "食べ物";
      break;
    case '2desert':
      $typeName = "デザート";
      break;
    case '3spice':
      $typeName = "ジャム、スパイスなど";
      break;
    case '4drink':
      $typeName = "飲み物";
      break;
    default:
      $typeName = "その他";
      break;
  }
  return $typeName;
}
?>
