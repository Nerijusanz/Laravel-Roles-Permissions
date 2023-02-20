<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('cruds.permission.title_singular') }} {{ __('global.list') }}
        </h2>
    </x-slot>

    @can('permission_create')
        <a class="" href="{{ route('admin.permissions.create') }}">
            {{ __('global.add') }} {{ __('cruds.permission.title_singular') }}
        </a>
    @endcan

    <table class="">
        <thead>
            <tr>
                <th>
                    {{ __('cruds.permission.fields.id') }}
                </th>
                <th>
                    {{ __('cruds.permission.fields.title') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $key => $permission)
                <tr>

                    <td>
                        {{ $permission->id ?? '' }}
                    </td>
                    <td>
                        {{ $permission->title ?? '' }}
                    </td>
                    <td>
                        
                        @can('permission_show')
                            <a class="" href="{{ route('admin.permissions.show', $permission->id) }}">
                                {{ __('global.view') }}
                            </a>
                        @endcan

                        @can('permission_edit')
                            <a class="" href="{{ route('admin.permissions.edit', $permission->id) }}">
                                {{ __('global.edit') }}
                            </a>
                        @endcan

                        @can('permission_delete')
                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ __("global.areYouSure") }}');" style="display: inline-block;">
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