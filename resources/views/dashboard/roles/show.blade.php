<x-layout :title="$role->name" :breadcrumbs="['dashboard.roles.show', $role]">
    @component('dashboard::components.box')
        @slot('bodyClass', 'p-0')

        <table class="table table-striped table-middle">
            <tbody>
            <tr>
                <th width="200">@lang('roles.attributes.name')</th>
                <td>{{ $role->name }}</td>
            </tr>

            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" >
                    <ul class="todo-list" data-widget="todo-list">
                        @foreach($role->permissions as $permission)
                            <li>
                                <!-- drag handle -->
                                <span class="handle">
                                    <i data-feather="more-vertical"></i>
                                    <i data-feather="more-vertical"></i>
                                </span>
                                <!-- todo text -->
                                <span class="text">{{$permission->name}}</span>
                            </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
        </div>

        @slot('footer')
            @include('dashboard.roles.partials.actions.edit')
            @include('dashboard.roles.partials.actions.delete')
        @endslot
    @endcomponent

</x-layout>
