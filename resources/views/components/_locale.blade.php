<form class="d-inline" method="POST" action="{{ route('set_language_locale', $lang) }}">
    @csrf
    <button type="submit" class="btn ps-1 pe-1">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="25" height="25">
    </button>
</form>
