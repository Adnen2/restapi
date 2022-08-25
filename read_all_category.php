<?php
    //Headers
    header('Access-control-Allow-Origin: *');
    header('Content-Type: application/json');

    //initializing our api
    include_once('../core/initialize.php');

    //Instansiate blog post object
    $post = new category($db);

    //Blog post query
    $result = $post->read();
    //Get row count
    $num = $result->rowCount();

    //Check if any posts
    if($num>0){
        //Post array
        $posts_arr = array();
        $posts_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $post_item = array(
                'id' =>$id,
                'name' =>$name,
                'created_at' => $created_at,
                
            );

            //Push to "data"
            array_push($posts_arr['data'],$post_item);
        }

        //Turn to JSON & output
        echo json_encode($posts_arr);


    }else {
        //No Posts
        echo json_encode(array
        ('message' => 'No Categories Found')
    );

    }