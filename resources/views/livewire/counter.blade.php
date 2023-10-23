<div>
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button>
    <label>
        Message
        <input wire:model.live="message" type="text" name="message" />
    </label>
    Text : {{$message}}
</div>