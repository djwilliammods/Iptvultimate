<?php

// M3U file path
$m3u_file_path = 'http://tv5.me/get.php?username=12n61347&password=80708nr&type=m3u';

// Regular expression patterns to extract data
$pattern_name = '/tvg-name="([^"]+)"/';
$pattern_link = '/(https?:\/\/vip-ayras\S+)/';

// Function to extract data from M3U file
function extractDataFromM3U($input_text) {
    global $pattern_name, $pattern_link;

    // Match patterns against input text
    preg_match_all($pattern_name, $input_text, $matches_name);
    preg_match_all($pattern_link, $input_text, $matches_link);

    // Extract matched data
    $names = $matches_name[1];
    $links = $matches_link[1];

    // Create an array of JSON objects with extracted data
    $output_array = array();
    for ($i = 0; $i < count($names); $i++) {
        $output_array[$i] = array(
            'name' => $names[$i],
            'link' => $links[$i]
        );
    }

    return $output_array;
}

// Check if a search string is specified in the query parameters
$search_string = isset($_GET['search']) ? $_GET['search'] : '';

// Read M3U file content
$input_text = file_get_contents($m3u_file_path);

// Extract data from M3U file
$output_array = extractDataFromM3U($input_text);

// Filter output array based on search string
if (!empty($search_string)) {
    $output_array = array_filter($output_array, function($entry) use ($search_string) {
        return stripos($entry['name'], $search_string) !== false;
    });
}

// Convert array to JSON format
$output_json = json_encode($output_array);

// Set response content type to JSON
header('Content-Type: application/json');

// Output JSON
echo $output_json;

?>