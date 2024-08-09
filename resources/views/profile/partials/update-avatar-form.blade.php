<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Change Avatar') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Add or Update your avatar.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.avatar') }}" class=" space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <x-input-file name="avatar" id="avatar" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>
        </div>
    </form>
</section>
