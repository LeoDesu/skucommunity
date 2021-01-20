<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CreateBlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('blogs.create');
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'content' => 'required'
        ],[
            'content.required' => 'ກະລຸນາຂຽນບາງຢ່າງເພື່ອໂພສກະທູ້'
        ]
        );
        if(request('content') || request('attachment')){

            $file = $request->file('attachment');
            if($file){
                $filePath = $request->file('attachment')->storeAs('files/uploads', $file->getFilename().'.'.$file->getClientOriginalExtension(), 'public');
            }else{
                $filePath = '';
            }
            
            $data = [
                'user_id' => $user->id,
                'content' => request('content'),
                'attachment' => $filePath,
                'views' => 0
            ];
            Blog::create($data);
        }

        return redirect('/latest');
    }

}
