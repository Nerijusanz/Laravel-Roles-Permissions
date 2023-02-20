<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('cruds.role.title_singular') }} {{ __('global.list') }}
        </h2>
    </x-slot>
    
    @can('role_create')
        <a class="" href="{{ route('admin.roles.create') }}">
            {{ __('global.add') }} {{ __('cruds.role.title_singular') }}
        </a>
    @endcan
    
    <table class="">
        <thead>
            <tr>
                <th>
                    {{ __('cruds.role.fields.id') }}
                </th>
                <th>
                    {{ __('cruds.role.fields.title') }}
                </th>
                <th>
                    {{ __('cruds.role.fields.permissions') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $key => $role)
                <tr>
                    <td>
                        {{ $role->id ?? '' }}
                    </td>
                    <td>
                        {{ $role->title ?? '' }}
                    </td>
                    <td>
                        @foreach($role->permissions as $key => $item)
                            <span class="">{{ $item->title }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('role_show')
                            <a class="" href="{{ route('admin.roles.show', $role->id) }}">
                                {{ __('global.view') }}
                            </a>
                        @endcan
                        
                        @can('role_edit')
                            <a class="" href="{{ route('admin.roles.edit', $role->id) }}">
                                {{ __('global.edit') }}
                            </a>
                        @endcan
                        
                        @can('role_delete')
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ __("global.areYouSure") }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="" value="{{ __('global.delete') }}">
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>