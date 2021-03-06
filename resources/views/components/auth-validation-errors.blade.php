@props(['errors'])

@if ($errors->any())
    <div {!! $attributes->merge(['class' => 'alert alert-danger alert-auto-close']) !!} role="alert">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

        <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>
        <ul class="mb-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
