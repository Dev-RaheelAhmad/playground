<div>
    <button wire:click="increment">click me</button>
    <div>{{ $count }}</div>

    <livewire:counter.child1 lazy :key="$count" />
    <livewire:counter.child2 lazy />
    <livewire:counter.child3 lazy />
</div>
