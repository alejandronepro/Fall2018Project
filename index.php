<?php
function getYouTubeVideoID($url) {
  $queryString = parse_url($url, PHP_URL_QUERY);
  parse_str($queryString,$params);
  if(isset($params['v']) && strlen($params['v'])>0) {
    return $params['v'];
  }
  else {
    return "";
  }
}

$video_url = 'https://www.youtube.com/watch?v=Be9PAj61n5g';
$api_key = 'AIzaSyDn24LL2yV3P1fUFvkiOaH4mNe32yBVCJU';
$api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.getYouTubeVideoID($video_url).'&key='.$api_key;



$channelid = 'UCmNl5WiIdIlygTO8YHdFLyA';
$channel_url = 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id='.$channelid.'&key='.$api_key;

$data = json_decode(file_get_contents($api_url));
$channeldata = json_decode(file_get_contents($channel_url));

$image = 'https://img.youtube.com/vi/'.getYouTubeVideoID($video_url).'/0.jpg';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>YouTube Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  </head>
  <body>
    <div class="header">
      <img src="img/youtube.png" alt="YouTube" width="150px">
      <h1>YouTube Dashboard</h1>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h4>Videos</h4>
          <p><?php echo $channeldata->items[0]->statistics->videoCount.'<br>';?></p>
        </div>

        <div class="col-sm">
          <h4>Subscribers</h4>
          <p><?php echo $channeldata->items[0]->statistics->subscriberCount.'<br>';?></p>
        </div>

        <div class="col-sm">
          <h4>Channel Views</h4>
          <p><?php echo $channeldata->items[0]->statistics->viewCount.'<br>';?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <h4>Comments</h4>
          <p><?php echo $data->items[0]->statistics->commentCount.'<br>';?></p>
        </div>

        <div class="col-sm">
          <h4><?php echo $data->items[0]->snippet->title.'<br>';?></h4>


          <?php echo '<img src="'.$image.'" width="300px">'; ?>

        </div>

        <div class="col-sm">
          <h4>Likes</h4>
          <p><?php echo $data->items[0]->statistics->likeCount.'<br>';?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <h4>Definition</h4>
          <p id="definition"><?php echo $data->items[0]->contentDetails->definition.'<br>';?></p>
        </div>

        <div class="col-sm">
          <h4>Views</h4>
          <p><?php echo $data->items[0]->statistics->viewCount.'<br>';?></p>
        </div>

        <div class="col-sm">
          <h4>Dislikes</h4>
          <p><?php echo $data->items[0]->statistics->dislikeCount.'<br>';?></p>
        </div>
      </div>
    </div>


    <footer>
      <p><b>Created by:</b></p>
      <p>Alejandro Valdez and Fernando Robles</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
