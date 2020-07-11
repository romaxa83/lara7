<div>
    {{$user->email}}: {{ now() }}

    <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
        wire:click="$refresh"
    >refresh</button>
</div>
