<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\News;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class NewsController extends Controller
{

    public function index()
    {
        $title = 'News';
        return view('administration.index', compact('title'));
    
    }

    public function add()
    {
        return view('livewire.news.add');
    
    }

    public function reply($news_id, $comments_id)
    {
        return view('reply',compact('news_id','comments_id'));
    
    }
    
    public function replycomment(Request $request,$news_id, $comments_id)
    {
        $comments= Comments::create([
            'content' => $request->comment,
            'compte_id' => auth()->user()->id,
            'comments_id' => $comments_id,
            'news_id' => $news_id,
        ]);
        return redirect('/detail/'.$news_id);
    }

    public function edit($id)
    {
        $new = News::find($id);
        return view('livewire.news.edit', compact('new'));
    }

    public function listcomment($id)
    {
        $new = News::find($id);
        return view('livewire.news.comment', compact('new'));
    }

    public function detail($id)
    {
        $new = News::findorfail($id);
        return view('livewire.news.detail', compact('new'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:5120',
        ]);

        if ($validator->fails()) {
            $reason='';
            foreach ($validator->errors()->all() as $error){
                $reason.='<li>'.$error.'</li>';
            }
            return response()->json([
                        'state' => 'error',
                        'reason' => $reason
                    ]);
        }

        $profileImage = $request->file('image'); 
        $profileImageSaveAsName = time(). Auth::id() ."-news.".$profileImage->getClientOriginalExtension();
        $upload_path=public_path('image/news/'.$profileImageSaveAsName);

        // $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        move_uploaded_file($profileImage,$upload_path);
        
        $news= News::create([
            'title' => $request->titre,
            'content' => $request->description,
            'image' => $profileImageSaveAsName,
        ]);
        return response()->json(['state'=>'success']);
    }

    public function comment(Request $request,$id)
    {
        $comments= Comments::create([
            'content' => $request->comment,
            'compte_id' => auth()->user()->id,
            'comments_id' => NULL,
            'news_id' => $id,
        ]);
        return redirect('/detail/'.$id);
    }

    public function update(Request $request, $id)
    {
        $new = News::find($id);
        if($request->hasFile('image')){
            $profileImage = $request->file('image'); 
            $profileImageSaveAsName = time(). Auth::id() ."-news.".$profileImage->getClientOriginalExtension();
            $upload_path=public_path('image/news/'.$profileImageSaveAsName);
            move_uploaded_file($profileImage,$upload_path);
        }else{
            $profileImageSaveAsName = $new->image;
        }
        $reponse = News::whereId($id)
        ->update(
            [
                'title' => $request->titre,
                'content' => $request->description,
                'image' => $profileImageSaveAsName,
            ]
        );
        return response()->json(['state'=>'success']);
    }

    public function destroy($id)
    {
        $news = News::destroy($id);
        return response()->json(['state'=>'success']);
    }

    public function paginate(Request $request)
    {
        try {
            $response = Http::withHeaders(['Authorization' => session()->get("token")])
                            ->get($request->page);
            $status = $response->status();
            // dd($response->json()['data']);
            switch ($status) {
                case 200 :
                    $users = $response->json()['data']; 
                    return view('users.table', compact('users')); 
                default:
                    return view('404');
            }

        } catch (Exception $e) {
            return "Problem";
        }
    }


}
