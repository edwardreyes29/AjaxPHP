<?php
  session_start();
  // $_SESSION['favorites'] = [];
  if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

  function is_favorite($id) {
    return in_array($id, $_SESSION['favorites']);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asynchronous Button</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <style>
    .favorite-heart {
      color: red;
      font-size: 2em;
      float: right;
      display: none;
    }
    .favorite .favorite-heart {
      display: block;
    }
  </style>
</head>
<body>
  <?php 
    // echo join(', ', $_SESSION['favorites']); 
  ?>
  <div class="container-fluid">
    <?php echo "v.1.8"; ?>
    <div id="blog-posts">
      <div class="card mb-2 mt-2" style="width: 50rem;">
        <div id="blog-post-101" class="blog-post card-body
          <?php 
            if(is_favorite(101)) { 
              echo 'favorite'; 
            }
          ?>" 
        >
          <span class="favorite-heart">&hearts;</span>
          <h3 class="card-title">Blog Post 101</h3>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non quam lacus suspendisse faucibus interdum posuere. Urna et pharetra pharetra massa massa ultricies mi quis. Leo in vitae turpis massa sed elementum tempus egestas. Facilisis magna etiam tempor orci eu lobortis elementum nibh. Purus sit amet luctus venenatis lectus magna fringilla urna. Aliquet bibendum enim facilisis gravida. Pellentesque habitant morbi tristique senectus et netus. Massa eget egestas purus viverra accumsan. Quam quisque id diam vel quam elementum pulvinar.
          </p>
          <button class="favorite-button btn btn-primary">Favorite</button>
        </div>
      </div>

      <div class="card mb-2" style="width: 50rem;">
        <div id="blog-post-102" class="blog-post card-body
          <?php 
            if(is_favorite(102)) { 
              echo 'favorite'; 
            }
          ?>"
        >
          <span class="favorite-heart">&hearts;</span>
          <h3 class="card-title">Blog Post 102</h3>
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Eget mauris pharetra et ultrices. Vestibulum lectus mauris ultrices eros in cursus. Viverra nibh cras pulvinar mattis nunc sed. Neque vitae tempus quam pellentesque nec nam aliquam sem. Orci nulla pellentesque dignissim enim sit amet venenatis urna. Diam vel quam elementum pulvinar etiam. Eu turpis egestas pretium aenean pharetra magna ac placerat vestibulum. Integer quis auctor elit sed vulputate mi sit. Rhoncus dolor purus non enim praesent elementum facilisis leo. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Erat velit scelerisque in dictum non consectetur a erat nam. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo. Nunc scelerisque viverra mauris in aliquam sem fringilla ut morbi. Netus et malesuada fames ac turpis egestas. Nulla pellentesque dignissim enim sit amet venenatis urna. Consequat nisl vel pretium lectus. Velit dignissim sodales ut eu.
          </p>
          <button class="favorite-button btn btn-primary">Favorite</button>
        </div>
      </div>

      <div class="card mb-2" style="width: 50rem;">
        <div id="blog-post-103" class="blog-post card-body
          <?php 
            if(is_favorite(103)) { 
              echo 'favorite'; 
            }
          ?>"
        >
          <span class="favorite-heart">&hearts;</span>
          <h3 class="">Blog Post 103</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam vulputate dignissim suspendisse in. Eu nisl nunc mi ipsum. Adipiscing at in tellus integer feugiat. Quam id leo in vitae turpis massa sed elementum tempus. In nulla posuere sollicitudin aliquam. Hendrerit gravida rutrum quisque non tellus orci ac auctor. Id faucibus nisl tincidunt eget nullam non nisi. Nam libero justo laoreet sit amet cursus sit amet dictum. Dignissim enim sit amet venenatis. Vitae tempus quam pellentesque nec nam aliquam sem et. Odio ut sem nulla pharetra diam. Pharetra pharetra massa massa ultricies. Dignissim convallis aenean et tortor at risus viverra adipiscing.
          </p>
          <button class="favorite-button btn btn-primary">Favorite</button>
        </div>
      </div>
    </div>
  </div>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script>
    function favorite() {
      let parent = this.parentElement;
      let xhr = new XMLHttpRequest();
      xhr.open('POST', 'favorite.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // when sending POST request
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200) {
          let result = xhr.responseText;
          console.log('Result: ' + result);
          if (result == 'true') {
            parent.classList.add("favorite");
          }
        }
      }
      xhr.send("id=" + parent.id)
    }

    let buttons = document.getElementsByClassName('favorite-button');
    for(i=0; i < buttons.length; i++) {
      buttons.item(i).addEventListener('click', favorite);
    }
  </script>
</body>
</html>