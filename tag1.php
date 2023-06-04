<?php
$keyword = "IPRATING";

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://youtube-tags-generator.p.rapidapi.com/tags?keyword=$keyword",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: youtube-tags-generator.p.rapidapi.com",
		"X-RapidAPI-Key: bac0f77ff9mshaa1ddc0bc4f9d0ep108287jsn9f3489f6d83f"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// print_r($response);
    $tags=explode(",", $response);
    print_r($tags);
    foreach ($tags as $value) {

        foreach ($tags as $value) {
            echo "$value <br>";
        }
    }
}
// Include the RapidAPI PHP library
// require_once "rapidapi.php";

// Set your RapidAPI credentials
// $username = "YOUR_USERNAME";
// $password = "YOUR_PASSWORD";

// Set the word you want to generate tags for
// $word = "YOUR_WORD";

// Send a request to the YouTube API to generate tags based on the word
// $response = RapidAPI::call("YouTube", "getTags", array(
//     "username" => $username,
//     "password" => $password,
//     "word" => $word
// )
// );

// Check if the API request was successful
// if ($response) {
    // Retrieve the generated tags from the API response
    // $tags = $response[];

    // Use the tags as needed in your code
// } else {
    // There was an error with the API request
    // echo $response["error"];
// }

?>