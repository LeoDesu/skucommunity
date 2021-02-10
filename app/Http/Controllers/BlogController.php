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

    public function announcements(){
        $title = 'ແຈ້ງການ';
        $blogs = Blog::orderBy('created_at', 'desc')->get()->filter(
            function($i){
                return $i->author->role == 'admin';
            }
        );

        return view('blogs.blogs', compact('blogs', 'title'));
    }

    public function myclass(){
        $title = 'ຫ້ອງຮຽນ';
        $blogs = Blog::orderBy('created_at', 'desc')->get()->filter(
            function($i){
                return $i->author->major_id == Auth::user()->major_id;
            }
        );

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
        $upvotes = Votes::where('blog_id', $blog->id)->where('upvote', 1)->count();
        $downvotes = Votes::where('blog_id', $blog->id)->where('downvote', 1)->count();
        return view('blogs.blog', compact('blog', 'image', 'video', 'audio', 'comments', 'upvotes', 'downvotes'));
    }
    
    public function upvote(Request $request){
        $user = Auth::user();
        $blog = Blog::find($request->blog_id);
        if(!$blog) return abort(404);
        $isUpvoted = $user->votes->filter(
            function($i) use ($blog){
                return $i->id == $blog->id && $i->pivot->upvote == 1;
            })->count();
        if($isUpvoted){
            $blog->votes()->detach($user->id);
            return 0;
        }else{
            $blog->votes()->detach($user->id);
            $blog->votes()->attach([
                $user->id => [
                    'upvote' => 1
                ]
            ]);
            return 1;
        }
    }

    public function getUpvotes(Blog $blog){
        return Votes::where('blog_id', $blog->id)->where('upvote', 1)->count();
    }

    public function downvote(Request $request){
        $user = Auth::user();
        $blog = Blog::find($request->blog_id);
        if(!$blog) return abort(404);
        $isDownvoted = $user->votes->filter(
            function($i) use ($blog){
                return $i->id == $blog->id && $i->pivot->downvote == 1;
            })->count();
        if($isDownvoted){
            $blog->votes()->detach($user->id);
            return 0;
        }else{
            $blog->votes()->detach($user->id);
            $blog->votes()->attach([
                $user->id => [
                    'downvote' => 1
                ]
            ]);
            return 1;
        }
    }

    public function getDownvotes(Blog $blog){
        return Votes::where('blog_id', $blog->id)->where('downvote', 1)->count();
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
