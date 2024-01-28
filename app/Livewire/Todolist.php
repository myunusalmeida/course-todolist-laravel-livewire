<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todolist extends Component
{
    public $id_todo = 0;
    public $title = '';
    public $isEdit = false;

    public function save()
    {
        if ($this->id_todo == '' || $this->id_todo == 0) {
            Todo::create([
                'title' => $this->title,
            ]);
        } else {
            Todo::find($this->id_todo)->update([
                'title' => $this->title,
            ]);
        }

        $this->reset();
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        $this->id_todo = $todo->id;
        $this->title = $todo->title;
        $this->isEdit = true;
    }

    public function delete($id)
    {
        Todo::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.todolist', [
            'todos' => Todo::orderBy('id', 'desc')->get()
        ]);
    }
}
