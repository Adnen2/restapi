<?php
    //Headers
    header('Access-control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type
    , Access-Control-Allow-Methods,Authorization,X-Requested-With');

    //initializing our api
    include_once('../core/initialize.php');

    //Instansiate blog post object
    $post = new Post($db);

    //get raw posteddata
    $data  =json_decode(file_get_contents("php://input"));
    
    $post->id = $data->id;

    //creat post

    if($post->delete()){
        echo json_encode(
            array('message'=>'Post deleted')
        );
    }else{
        echo json_encode(
            array('message'=>'Post not deleted')
            
        );
    }

