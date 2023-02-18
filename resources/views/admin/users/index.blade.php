<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('cruds.user.title_singular') }} {{ __('global.list') }}
        </h2>
    </x-slot>
            
    <a class="" href="{{ route('admin.users.create') }}">
        {{ __('global.add') }} {{ __('cruds.user.title_singular') }}
    </a>
    
    <table class="">
                <thead>
                    <tr>
                        <th>
                            {{ __('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ __('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ __('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ __('cruds.user.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ __('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ __('global.view') }}
                                </a>

                                <a class="" href="{{ route('admin.users.edit', $user->id) }}">
                                    {{ __('global.edit') }}
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="" value="{{ __('global.delete') }}">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</x-admin-layout>