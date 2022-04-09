<div>
    <h1 class="text-3xl py-2 text-center">Register Form</h1>
   <form wire:submit.prevent="submit">
    <div class="flex flex-wrap my-2">
        <input type="text" wire:model="form.name" name="name" class="border rounded shadow p-2 w-full focus:outline-1 focus:outline-indigo-400" 
        placeholder="Enter Name">
        @error('form.name') <span class="text-red-400 w-full">{{ $message }}</span> @enderror
    </div>
    <div class="flex flex-wrap my-2">
        <input type="email" wire:model="form.email" name="email" class="border rounded shadow p-2 w-full focus:outline-1 focus:outline-indigo-400" 
        placeholder="Enter Email">
        @error('form.email') <span class="text-red-400">{{ $message }}</span> @enderror
    </div>
    <div class="flex flex-wrap my-2">
        <input type="password" wire:model="form.password" name="password" class="border rounded shadow p-2 w-full focus:outline-1 focus:outline-indigo-400" 
        placeholder="Enter Password">
        @error('form.password') <span class="text-red-400">{{ $message }}</span> @enderror
    </div>
    <div class="flex flex-wrap my-2">
        <input type="password" wire:model="form.password_confirmation" name="password_confirmation" class="border rounded shadow p-2 w-full focus:outline-1 focus:outline-indigo-400" 
        placeholder="Confirm Password">
        @error('form.password_confirmation') <span class="text-red-400">{{ $message }}</span> @enderror
    </div>
    <div class="flex my-2">
        <button class="border rounded shadow bg-indigo-200 border-indigo-400 w-full p-2 ">Register Now</button>
    </div>
   </form>
</div>
