<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateCommentRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $userId)
    {
        if(!$user = $this->user->find($userId)) {
            return redirect()->back();
        }
        //dd($request->search);
        $comments = $user->comments()
        ->where('body', 'LIKE', "%{$request->search}%")
        ->paginate(1);

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($userId)
    {
        if(!$user = $this->user->find($userId)) {
            return redirect()->back();
        }

        return view('users.comments.create', compact('user'));
    }

    public function store(StoreUpdateCommentRequest $request, $userId)
    {
        if(!$user = $this->user->find($userId)) {
            return redirect()->back();
        }
        //dd($request->all());
        //$user->comments()->create($request->all());
        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userId, $id)
    {
        if(!$comment = $this->comment->find($id)) {
            return redirect()->back();
        }

        $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }

    public function update(StoreUpdateCommentRequest $request, $id)
    {
        if(!$comment = $this->comment->find($id)) {
            return redirect()->back();
        }
        //dd($request->all());
        //$user->comments()->create($request->all());
        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $comment->user_id);
    }
}