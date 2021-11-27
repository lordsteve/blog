<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt; 
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()  //Begin gathering together all posts 
    {
        return cache()->rememberForever('posts.all', function () {   //Save all of the following on client-side cache under the name 'posts.all' and remember it until manually cleared
            return collect(File::files(resource_path("posts")))  //Using the File model to define files, build a collection of all of the files in the "resources/posts" folder
                ->map(fn($file) => YamlFrontMatter::parseFile($file))   //Map that collection to individual files defined with "file" variable and pass that variable to YamlFrontMatter model to have metadata parsed
                ->map(fn($document) => new Post(  //Map metadata into documents defined by "document" variable, pass "document" to Post class to give names and/or functions (below) to metadata
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date');  //sort posts by date, newest first
        });
    }

    public static function find($slug)  //start finding a post based on the given URI defined by "slug" variable
    {
        return static::all()->firstWhere('slug', $slug); //out of all the posts (defined above, line 31), display the first one where the "slug" metatag equals the given URI
    }
    public static function findOrFail($slug)
    {
        $post = static::find($slug);
        if (! $post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
