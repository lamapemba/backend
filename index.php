<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
</head>
<body>
    <div class= "container" id = "newsdiv">
    <?php
        $jsondata = file_get_contents("C:/Users/User/OneDrive/Desktop/Assessment/news.json"); //parsing Json file
        $news = json_decode($jsondata); // decoding the Json file
        //  print_r($news);
        sort($news); //sorting by alphabet

        foreach($news as $n){

            $title = $n->title; //title
            echo '<h2>' .$title.'</h2>';

            $newsDate = date("l, jS \of F Y h:i A", strtotime($n->pubDate)); //date in correct format
            echo '<p><i> Date: '.$newsDate.'</p></i>';

            $description = $n->description; //content
            echo '<p>' .$description.'</p>';
            
            $newsLink = $n->link;
            foreach ((array) $newsLink as $nl){   //stri
        
                // echo "URL: ".$nl. "<br>";
                

                if (strpos($nl,"urn")!==false || strpos($nl,"urc")!==false){
                    // echo "Word found ";
                    echo "Link: ".$nl. "<br>";
                }
                else {  

                   echo "<a href= .$nl. target = '_blank'>Read more</a><br>";
                    
                //    echo "URL: ".$nl. "<br>";
                }
            }
        }
        

    ?>
        
    </div> 

</body>
</html>