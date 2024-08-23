<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-center font-bold text-[27px]">Create Ticket</h1>
                <form action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area id="description" class="block mt-1 w-full" name="description" :value="old('description')" autofocus />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="attachment" :value="__('Attachment')" />
                        <x-input-file id="attachment" name="attachment" autofocus />
                        <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                    </div>
                    <x-primary-button class="mt-4 float-end">
                        {{ __('Create') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>