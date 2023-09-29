<div class="row p-2">
    <form wire:submit.prevent="submit">
        <h1> {{ $message }} </h1>
        {{ $slot }}
    </form>
</div>