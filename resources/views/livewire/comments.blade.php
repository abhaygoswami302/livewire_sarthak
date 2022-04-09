<div class="flex justify-center p-2">
    <div class="w-full">
        <h1 class="py-2 text-3xl mb-2">Comments</h1>
        
        @if (Session::has('message'))
            <p class="p-3 my-3 bg-indigo-200 text-indigo-600 text-center rounded shadow">{{ Session::get('message') }}</p>            
        @endif
        @error('newComment')<span class="text-red-500 text-xs ">{{ $message }}</span>@enderror

        <section>
            @if ($image)
            <img src="{{ $image }}" alt="image" style="width:200px;height:200px" class="py-3">                
            @endif
            <input type="file" wire:change="$emit('fileChoosen')" name="image" id="image">
        </section>
        
        <form class="my-4 flex" wire:submit.prevent="addComment">
            <input type="text" wire:model.debounce.500ms="newComment" 
                class="w-full bg-indigo-100 rounded border-indigo-300 border shadow-md p-2 mr-2 my-2 
                hover:border-indigo-400 focus:outline-1 focus:outline-indigo-400" 
                placeholder="Whats on your mind?">
            <div class="py-2">
                <button type="submit" class="p-2 bg-indigo-500 w-20 rounded shadow-lg text-white font-semibold">Add</button>
            </div>
        </form>
        
        @foreach ($comments as $comment)
            <div class="rounded-lg border-2 shadow-md p-3 my-3 border-indigo-200 hover:shadow-lg hover:border-2 hover:border-indigo-400">
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <p class="font-bold text-lg">{{ ucfirst($comment->creator->name) }}</p> 
                        <p class="mx-3 py-2 text-xs text-gray-500 font-semibold">{{ $comment->created_at->diffForHumans() }}</p>        
                    </div>                    
                    <i wire:click="remove({{ $comment->id }})" class="fas fa-times text-red-400 hover:text-2xl hover:text-red-500 cursor:pointer"></i>
                </div> 

                @if ($comment->image)
                <div class="flex justify-start">
                    <img src="{{ $comment->imagePath }}" style="width:150px;height:125px">
                    <p class="text-gray-800 px-4">
                        {{ $comment->body }}
                    </p> 
                </div>
                @else
                <p class="text-gray-800">
                    {{ $comment->body }}
                </p> 
                @endif
            </div>              
        @endforeach

        {{ $comments->links('pagination-links') }}
    
    </div>
</div>

