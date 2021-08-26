<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;


class Post
{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title,$excerpt,$date,$body,$slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }

    public static function all()
    {
        $files = File::files(resource_path("posts/"));
        
        return array_map(function ($file)
        {
            return $file->getContents();
        }, $files);
    }



    public static function find($slug)
    {

        //proper code is in web.php
        
    //$path = __DIR__ . "/../resources/posts/{$slug}.html";
    $path = resource_path("posts/{$slug}.html");

    if (! file_exists($path))
    {
        //dd("file does not exist");
        //ddd("file does not exist");
        //abort(404);
        //return redirect('/');
        throw new ModelNotFoundException();
    }

    //$post = file_get_contents($path);

    //-> $post = cache()->remember("posts.{$slug}",1200, fn() => file_get_contents($path));

    return cache()->remember("posts.{$slug}",1200, fn() => file_get_contents($path));
    
    // 1st variable tell the page to be displayed
    // from the views folder

    // 2nd variable acts as an key-value pair
    // we assign it some value and
    // the variable can accessed at the
    // page that is given as the first variable
    // ->name of variable must be same

    // return view('post', [
    //   'post' => $post
    // ]);
    

}
 }

 