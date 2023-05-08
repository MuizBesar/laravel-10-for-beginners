<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or update user avatar
        </p>
    </header>

        @if (session('message'))
            <div class="text-red-500">
                {{ session('message') }}
            </div>
        @endif

        <form method="post" action="{{ route('profile.avatar') }}">
            @method('patch')
            @csrf
        <div>
            <x-input-label for="name" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <br>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
</section>
