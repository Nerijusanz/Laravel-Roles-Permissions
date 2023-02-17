<x-admin-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('global.show') }} {{ __('cruds.permission.title_singular') }}
        </h2>
    </x-slot>

    <a class="" href="{{ route('admin.permissions.index') }}">
        {{ __('global.back_to_list') }}
    </a>

    <table class="">
        <thead>
            <tr>
                <th>
                    {{ __('cruds.permission.fields.id') }}
                </th>
                <th>
                    {{ __('cruds.permission.fields.title') }}
                </th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $permission->id }}
                </td>
                <td>
                    {{ $permission->title }}
                </td>
            </tr>
        </tbody>
    </table>
</x-admin-layout>