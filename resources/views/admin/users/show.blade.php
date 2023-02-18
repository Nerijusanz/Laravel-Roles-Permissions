<x-admin-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('global.show') }} {{ __('cruds.user.title_singular') }}
        </h2>
    </x-slot>

    <a class="" href="{{ route('admin.users.index') }}">
        {{ __('global.back_to_list') }}
    </a>

    <table class="">
        <tbody>
            <tr>
                <th>
                    {{ __('cruds.user.fields.id') }}
                </th>
                <td>
                    {{ $user->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ __('cruds.user.fields.name') }}
                </th>
                <td>
                    {{ $user->name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ __('cruds.user.fields.email') }}
                </th>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ __('cruds.user.fields.roles') }}
                </th>
                <td>
                    @foreach($user->roles as $key => $roles)
                        <span class="">{{ $roles->title }}</span>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</x-admin-layout>