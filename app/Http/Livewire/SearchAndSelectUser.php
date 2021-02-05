<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchAndSelectUser extends Component
{
    public $search = '';
    public $selected = null;

    public function select($name){
        $this->selected = $name;
        $this->search = '';
    }

    public function render()
    {
        $users = User::where('name', 'like', $this->search == ''? '':"%$this->search%")->get();
        return view('livewire.search-and-select-user', [
            'users' => $users,
            'selected' => $this->selected
        ]);
    }
}
