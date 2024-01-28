<div>
    <h3 class="mb-5">Todo List</h3>

    <form wire:submit="save" class="mb-3">
        <input type="hidden" wire:model="id_todo">
        <div class="mb-3">
            <label for="title">Judul Todo</label>
            <input type="text" wire:model="title" class="form-control shadow-none">
        </div>
        <button type="submit" class="btn btn-primary">{{ $isEdit == true ? 'Edit' : 'Buat' }}</button>
    </form>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Todo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <p class="text-dark fw-semibold mb-0">{{ $item->title }}</p>
                            <p class="text-secondary">{{ $item->description }}</p>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-warning" wire:click="edit({{ $item->id }})">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $item->id }})"
                                    wire:confirm="Kamu yakin ingin menghapusnya?">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
