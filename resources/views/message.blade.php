@if(session()->exists('message'))
<div class="alert alert-{{ session()->get('color') }} text-center" role="alert">
    {{ session()->get('message') }}
</div>
@endif