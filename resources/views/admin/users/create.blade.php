<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('global.create') }} {{ __('cruds.user.title_singular') }}
        </h2>
    </x-slot>

    <a class="" href="{{ route('admin.users.index') }}">
        {{ __('global.back_to_list') }}
    </a>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('cruds.user.fields.name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('cruds.user.fields.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('cruds.user.fields.password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="text" name="password" :value="old('password')" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="roles" :value="__('cruds.user.fields.roles')" />

            <select class="" name="roles[]" id="roles" multiple required>
                @foreach($roles as $id => $roles)
                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('roles')" class="mt-2" />

        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('global.save') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>