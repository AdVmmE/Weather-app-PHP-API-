<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form method="POST">
        <label for="city">Chooes a city</label>
        <select name="city" id="city">
        <option value="Casablanca">Casablanca</option>
        <option value="	BeniMellal">Beni Mellal</option>
        </select>
        <button type="submit" name="getWeather">Gt temperature</button>
    </form><br>

    <div id="result">
        <?php
            if(isset($_POST['getWeather'])){
                $city = $_POST['city'];
                $apiKey = '9b059572784f6349df33dcada1ac8265';
                $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,MA&appid=$apiKey&units=metric";
                $request = curl_init();
                curl_setopt($request, CURLOPT_URL, $url);  
                curl_setopt($request , CURLOPT_RETURNTRANSFER,true);
                $response = curl_exec($request);
                curl_close($request);
                

                    if($response){
                        $data = json_decode($response, true);

                        if(isset($data['main']['temp'])){
                            $temp = $data['main']['temp'];
                            $description = $data['weather'][0]['description'];

                            echo "<p> the temp in $city is {$temp} and its {$description}.</p>  ";

                        }
                    }
            }
        ?>
    </div>
</div>
</body>
</html>