<?php 
  session_start();

  if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  // Function to remove single element in array
  function array_remove($element, $array) {
    $index = array_search($element, $array);
    array_splice($array, $index, 1);
    return $array;
  }

  if(!is_ajax_request()) { exit; }

  // extract $id
  $raw_id = isset($_POST['id']) ? $_POST['id'] : '';
  // echo $raw_id;

  if(preg_match("/blog-post-(\d+)/", $raw_id, $matches)) {
    $id = $matches[1]; // position 1 stores the id

    // store in $_SESSION['favorites]
    if (in_array($id, $_SESSION['favorites'])) {
      $_SESSION['favorites'] = array_remove($id, $_SESSION['favorites']);
    }
    echo 'true';
    // return true/false
  } else {
    echo 'false';
  }
?>