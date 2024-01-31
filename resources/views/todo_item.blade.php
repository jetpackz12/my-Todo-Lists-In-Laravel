<x-layout>
    <div class="row" style="height: 100vh">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="card w-50 mt-5">
                <div class="card-header bg-warning">
                    <h4>Todo App</h4>
                </div>
                <div class="card-body">
                    <div class="row gap-2">
                        <div class="col-12">
                            <form class="d-flex justify-content-center gap-2" method="POST" action="{{ route('update') }}">
                                @method('PUT')
                                @csrf
                                <input class="form-control" type="text" name="id" value="{{$todo->id}}" readonly hidden>
                                <input class="form-control" type="text" name="todo" value="{{$todo->todo}}">
                                <button type="submit" class="btn btn-primary w-25">
                                    Update Todo
                                </button>
                                <a class="btn btn-secondary" href="{{ url('/') }}">
                                    Back
                                </a>
                            </form>
                            @error('todo')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>