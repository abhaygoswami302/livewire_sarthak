<div class="p-2">
    <h1 class="text-3xl py-2">Support Tickets</h1>
    @foreach ($tickets as $ticket)
        <div class="p-3 my-3 border shadow shadow-indigo-200 rounded border-indigo-200
            hover:shadow-lg hover:border-indigo-300 
            {{ $active == $ticket->id ? 'bg-indigo-200' : '' }}" 
            wire:click="$emit('ticketSelected', {{ $ticket->id }})">
            <p class="text-gray-800">{{ $ticket->question }}</p>
        </div>
    @endforeach
</div>
