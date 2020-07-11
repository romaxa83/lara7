{{--<div>--}}
{{--    <input wire:model="name" type="text">--}}
{{--    <input wire:model="check" type="checkbox">--}}
{{--    <select wire:model="greeting">--}}
{{--        <option>Hello</option>--}}
{{--        <option>Goodbay</option>--}}
{{--        <option>Adios</option>--}}
{{--    </select>--}}

{{--    <select wire:model="tech" multiple>--}}
{{--        <option>HTML</option>--}}
{{--        <option>PHP</option>--}}
{{--        <option>CSS</option>--}}
{{--    </select>--}}

{{--    {{$greeting}} {{$name}} @if ($check) ! @endif {{implode(', ', $tech)}}--}}

{{--    <button wire:click="resetName('Bingo')">ResetName</button>--}}
{{--    <button wire:click="resetName($event.target.innerText)">ResetNameEvent</button>--}}

{{--    <form action="#" wire:submit.prevent="resetName('Bingo')">--}}
{{--        <button>Submit</button>--}}
{{--    </form>--}}
{{--</div>--}}
<div>
    @foreach($users as $user)
        <div>
            @livewire('say-hello', ['user' => $user], key($user->email))
        </div>

        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
            wire:click="removeUser('{{ $user->email }}')"
        >Remove</button>
    @endforeach

        <hr>

        {{ now() }}

        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
            wire:click="refreshChildren"
        >Refresh Children</button>
</div>
