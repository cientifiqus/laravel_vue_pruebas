<div>
    <form method="POST" action="{{ !empty($Task) ? route('tasks.edit',$Task->id) : route('tasks.store') }}">sdfasf
        @csrf
        {{ !empty($Task) ? method_field('GET') : "" }}
        <div class="form-group row">
            <label for="task-title" class="col-md-4 col-form-label text-md-right">Task title</label>

            <div class="col-md-6">
                <input id="task-title" type="text"
                    class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                    value="{{ !empty($Task) ? $Task->title : old('title') }}" required autofocus>
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    @if (empty($Task))
                        Add
                    @else
                        Update
                    @endif
                </button>
            </div>
        </div>
    </form>
</div>
