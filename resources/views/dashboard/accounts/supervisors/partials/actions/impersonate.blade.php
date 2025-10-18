@canBeImpersonated($supervisor)
<a href="{{ route('impersonate', $supervisor) }}"
   title="@lang('users.impersonate.go')"
   class="btn btn-outline-success btn-sm">
    <i data-feather="droplet"></i>
</a>
@endCanBeImpersonated
