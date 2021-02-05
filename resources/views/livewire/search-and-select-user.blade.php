<div class="row">
    <input wire:model="search" type="text" class="form-control" placeholder="{{ $selected? $selected:'ຄົ້ນຫາ' }}">
    @foreach ($users as $user)
        <li wire:click="select('{{ $user->name }}')" class="list-unstyled w-100 border pt-1 pb-1 pl-3 pr-3">
            {{ $user->id }}
            {{ $user->name }}
            {{ $user->major->name }}
        </li>
    @endforeach
</div>
