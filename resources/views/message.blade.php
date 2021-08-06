@if(session()->exists('message'))
<div class="message message-{{ $color }}">
    {{ $slot }}
</div>
@endif
