@props(['success'])

<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    {{ $success }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>