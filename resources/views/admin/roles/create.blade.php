<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('global.create') }} {{ __('cruds.role.title_singular') }}
        </h2>
    </x-slot>

    <a class="" href="{{ route('admin.roles.index') }}">
        {{ __('global.back_to_list') }}
    </a>

    <form method="POST" action="{{ route('admin.roles.store') }}">
        @csrf

        <div>
            <x-input-label for="title" :value="__('cruds.role.fields.title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('global.save') }}
            </x-primary-button>
        </div>
    </form>
</x-admin-layout>