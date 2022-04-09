<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Image;

class Comments extends Component
{
    use WithPagination, WithFileUploads;

    //public $comments;

    public $newComment;

    public $image = '';

    public $ticketId = 1;

    public $listeners = [
        'fileUpload' => 'handleFileUpload',
        'ticketSelected' => 'handleTicketSelected'
    ];

    public function handleTicketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

    /*public function mount()
    {
        $initial_comments = Comment::latest()->get();
        $this->comments = $initial_comments;
    }*/

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|min:3|max:225']);
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required|min:3|max:225']);
        
        $image = $this->storeImage();

        $createdComment = Comment::create([
            'body' => $this->newComment, 
            'user_id' => 1,
            'support_ticket_id' => $this->ticketId,
            'image' => $image
        ]);

        //$this->comments->prepend($createdComment);

        $this->newComment = "";
        $this->image = "";

        session()->flash('message', 'Comment Added Successfully😎');
    }

    public function storeImage()
    {
        if(!$this->image) {
            return null;
        } 

        $img = Image::make($this->image)->encode('jpg');

        $name = Str::random().'.jpg';

        Storage::disk('public')->put($name, $img);

        return $name;
    }

    public function remove($commentID)
    {
        $comment = Comment::find($commentID);

        Storage::disk('public')->delete($comment->image);

        $comment->delete();

        //$this->comments = $this->comments->except($commentID);

        session()->flash('message', "Comment Removed Successfully😃");
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(20)]);
    }
}
