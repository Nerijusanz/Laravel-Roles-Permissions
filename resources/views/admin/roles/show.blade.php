<x-admin-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('global.show') }} {{ __('cruds.role.title_singular') }}
        </h2>
    </x-slot>

    <a class="" href="{{ route('admin.roles.index') }}">
        {{ __('global.back_to_list') }}
    </a>

    <table class="">
        <thead>
            <tr>
                <th>
                    {{ __('cruds.role.fields.id') }}
                </th>
                <th>
                    {{ __('cruds.role.fields.title') }}
                </th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $role->id }}
                </td>
                <td>
                    {{ $role->title }}
                </td>
            </tr>
        </tbody>
    </table>
</x-admin-layout>