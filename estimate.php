<?php

$apiKey = "YOUR_OPENAI_API_KEY";

$imagePath = $_FILES['junk_image']['tmp_name'];
$imageData = base64_encode(file_get_contents($imagePath));

$payload = [
    "model" => "gpt-4.1",
    "messages" => [
        [
            "role" => "user",
            "content" => [
                ["type" => "text", "text" =>
                    "Estimate the junk removal load size in truck fraction 
                    (1/8, 1/4, 1/2, 3/4, full), count heavy items, 
                    and return JSON only in this format:
                    {
                      volume: '',
                      heavy_items: 0,
                      difficulty: 'easy|medium|hard'
                    }"
                ],
                [
                    "type" => "image_url",
                    "image_url" => [
                        "url" => "data:image/jpeg;base64,$imageData"
                    ]
                ]
            ]
        ]
    ]
];

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$aiOutput = json_decode($data['choices'][0]['message']['content'], true);

// Pricing logic
$prices = [
    "1/8" => 99,
    "1/4" => 199,
    "1/2" => 349,
    "3/4" => 499,
    "full" => 649
];

$base = $prices[$aiOutput['volume']] ?? 0;
$heavyFee = $aiOutput['heavy_items'] * 40;

$difficultyFee = 0;
if ($aiOutput['difficulty'] === "medium") $difficultyFee = 50;
if ($aiOutput['difficulty'] === "hard") $difficultyFee = 100;

$total = $base + $heavyFee + $difficultyFee;

echo "<h2>Estimated Price: $$total</h2>";
?>