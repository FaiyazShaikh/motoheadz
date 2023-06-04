<?php

// function to generate tags from a given word using YouTube API
function generateTags($word) {
  // YouTube API key
  $apiKey = "AIzaSyBJHR3o4Wk3CMteFZdJAIoC6nQvBpRO3cc";

  // create a cURL handle
  $ch = curl_init();

  // set cURL options
  curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$word&type=video&key=$apiKey");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  // execute cURL request and retrieve response
  $response = curl_exec($ch);

  // close cURL handle
  curl_close($ch);

  // decode JSON response
  $response = json_decode($response, true);

  // create an empty array to store tags
  $tags = array();

  // loop through items in response and add tags to array
  foreach ($response['items'] as $item) {
    $tags = array_merge($tags, explode(',', $item['snippet']['tags']));
  }

  // return array of tags
  return $tags;
}

// example usage
$word = "funny cats";
$tags = generateTags($word);

print_r($tags);

?>