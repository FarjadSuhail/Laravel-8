<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///

Route::get('/', function () {

   
    //     $document[] = YamlFrontMatter::parseFile($file);
   
     $files = File::files(resource_path("posts"));
    
     $posts = [];

     foreach ($files as $file)
     {
         $document = YamlFrontMatter::parseFile($file);
     
//        ddd($document->body());

        $posts[] = new Post(

            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
        // ddd($document->title);
     }
     
    
     //ddd($posts[0]->title);
      //ddd($posts);

    return view('posts', [
       'posts' => $posts
    ]);

    // $document = YamlFrontMatter::parseFile(
    //     resource_path('posts/post-three.html')
    // );

    // ddd($document->matter());
    // ddd($document->title());

    // return view('posts', [
    //     'posts' => Post::all()
    // ]);
});




///


// Route::get('/', function () {

//     // $files = File::files(resource_path("posts/"));
    
//     // $document = [];

//     // foreach ($files as $file)
//     // {
//     //     $document[] = YamlFrontMatter::parseFile($file);
//     // }
     
//     //ddd($document);

//     return view('posts', [
//         'posts' =>Post::all()
//     ]);

//     // $document = YamlFrontMatter::parseFile(
//     //     resource_path('posts/post-three.html')
//     // );

//     // ddd($document->matter());
//     // ddd($document->title());

//     // return view('posts', [
//     //     'posts' => Post::all()
//     // ]);
// });


//__DIR__ gives path of current directory 

//wildcard -> posts/{post} -> anything value after the / can be accessed


//another way to get it done is as below
// Route::get('posts/{post}', function ($slug) 
// {
//     //return $slug;
// //    dd($slug);

//     $path = __DIR__ . "/../resources/posts/{$slug}.html";
    
//     //ddd($path);

//     if (! file_exists($path))
//     {
//         //dd("file does not exist");
//         //ddd("file does not exist");
//         //abort(404);
//         return redirect('/');
//     }

//     //$post = file_get_contents($path);

//     $post = cache()->remember("posts.{$slug}",1200, fn() => file_get_contents($path));
//     $test = 123;

//     // 1st variable tell the page to be displayed
//     // from the views folder

//     // 2nd variable acts as an key-value pair
//     // we assign it some value and
//     // the variable can accessed at the
//     // page that is given as the first variable
//     // ->name of variable must be same

//     return view('post', [
//       'post' => $post
//       //'test' => $test
//     ]);
// })->where('post', '[A-z_\-]+');



Route::get('posts/{post}', function ($slug) {
    
    //find a post by its slug and pass it to a view called "post"
    
    $post = Post::find($slug);
    
    return view('post', [
        'post' => $post
    ]);
});

