<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Votes;

class BlogController extends Controller
{
    public function latest(){
        $title = 'ກະທູ້ລ່າສຸດ';
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('blogs.blogs', compact('blogs', 'title'));
    }

    public function trending(){
        $title = 'ກະທູ້ທີ່ນິຍົມ';
        $blogs = Blog::orderBy('views', 'desc')->get();

        return view('blogs.blogs', compact('blogs', 'title'));
    }

    public function viewBlog(Blog $blog){
        $ext = pathinfo($blog->attachment, PATHINFO_EXTENSION);
        $image = !strcasecmp($ext,'jpg') || !strcasecmp($ext, 'png') || !strcasecmp($ext, 'jpeg') || !strcasecmp($ext, 'gif');
        $video = !strcasecmp($ext, 'mp4') || !strcasecmp($ext, 'webm');
        $audio = !strcasecmp($ext, 'mp4') || !strcasecmp($ext, 'm4a');
        $blog->views++;
        $blog->save();
        $comments = $blog->comments;
        $upvotes = count(Votes::where('blog_id', $blog->id)->where('upvote', 1)->get());
        $downvotes = count(Votes::where('blog_id', $blog->id)->where('downvote', 1)->get());
        return view('blogs.blog', compact('blog', 'image', 'video', 'audio', 'comments', 'upvotes', 'downvotes'));
    }
    
    public function upvote(Blog $blog){
        $user = Auth::user();
        $blog->votes()->detach($user->id);
        $blog->votes()->attach([
            $user->id => [
                'upvote' => 1
            ]
        ]);
        return redirect("/blog/".$blog->id);
    }
    public function downvote(Blog $blog){
        $user = Auth::user();
        $blog->votes()->detach($user->id);
        $blog->votes()->attach([
            $user->id => [
                'downvote' => 1
            ]
        ]);
        return redirect("/blog/".$blog->id);
    }
    public function comment(Blog $blog, Request $request){
        Comment::create([
            'user_id' => Auth::user()->id,
            'blog_id' => $blog->id,
            'comment' => $request->comment
        ]);
        return redirect("/blog/".$blog->id);
    }
}
