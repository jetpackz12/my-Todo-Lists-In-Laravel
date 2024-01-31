<x-layout>
    <div class="row" style="height: 100vh">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="card w-50">
                <div class="card-header">
                    <h4>Todo App</h4>
                </div>
                <div class="card-body">
                    <div class="row gap-2">
                        <div class="col-12">
                            <form class="d-flex justify-content-center gap-2" method="POST" action="{{ route('store') }}">
                                @csrf
                                <input class="form-control" type="text" name="todo" placeholder="Please enter item to be added.">
                                <button type="submit" class="btn btn-primary w-25">
                                    Add Todo
                                </button>
                            </form>
                            @error('todo')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered table-striped table-hover text-center">
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td class="todo d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#collapse_id{{$todo['id']}}">
                                                <p>{{$todo['todo']}}</p>
                                                <div class="collapse" id="collapse_id{{$todo['id']}}">
                                                    <form class="d-inline" method="GET" action="{{ route('edit', [$todo['id']]) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning">
                                                            Update
                                                        </button>
                                                    </form>
                                                    <form class="d-inline" method="POST" action="{{ route('delete', [$todo['id']]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if (count($todos) > 0)
                            <div class="col-12 d-flex justify-content-between">
                                <p>You have @php
                                    echo count($todos);
                                @endphp pending tasks.</p> 
                                <form class="w-25" method="POST" action="{{ route('delete_all') }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">
                                        Clear All
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>