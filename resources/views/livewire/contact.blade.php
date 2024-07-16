<div>
    I am contact page! {{ time() }}

    <livewire:about lazy :$name />

    <div>
        <input type="text" wire:model.live="name">
    </div>
    <div>
        <input type="text" wire:model.live="email">
    </div>
    <div>
        <input type="text" wire:model.live="password">
    </div>
    <p>{{ $name }}</p>
    <p>{{ $email }}</p>
    <p>{{ $password }}</p>
</div>
