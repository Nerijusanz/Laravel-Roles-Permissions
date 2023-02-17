<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('global.edit') }} {{ __('cruds.role.title_singular') }}
        </h2>
    </x-slot>

    <a class="" href="{{ route('admin.roles.index') }}">
        {{ __('global.back_to_list') }}
    </a>

    <form method="POST" action="{{ route('admin.roles.update', [$role->id]) }}">
        @method('PUT')
        @csrf

        <div>
            <x-input-label for="title" :value="__('cruds.role.fields.title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $role->title)" required />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="permissions" :value="__('cruds.role.fields.permissions')" />

            <select class="{{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                @foreach($permissions as $id => $permissions)
                    <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('permissions')" class="mt-2" />

        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('global.save') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>