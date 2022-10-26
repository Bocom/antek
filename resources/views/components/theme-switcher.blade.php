<div class="p-2 flex items-center justify-center" x-data="{
    theme: localStorage.theme ?? 'light',

    setTheme(t) {
        this.theme = t;

        localStorage.theme = t;

        document.documentElement.classList.remove('dark');
        document.documentElement.classList.remove('light');

        if (t === 'light') {
            document.documentElement.classList.add('light');
        } else if (t === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.add('light');
            }
        }
    }
}">
    <span class="sr-only">{{ __('Theme Switcher') }}</span>

    <div class="flex gap-x-6 sm:gap-x-4">
        <button
            type="button"
            x-on:click="setTheme('light')"
            class="border rounded-md shadow p-1 bg-white hover:bg-gray-100 dark:border-none dark:bg-gray-600 dark:border-gray-700 dark:hover:bg-gray-500"
            :class="theme === 'light' ? 'text-blue-400' : 'text-gray-700 dark:text-gray-300'"
        >
            <span class="sr-only">{{ __('Light Theme') }}</span>

            <x-icons.sun class="w-10 h-10 sm:w-6 sm:h-6" />
        </button>

        <button
            type="button"
            x-on:click="setTheme('dark')"
            class="border rounded-md shadow p-1 bg-white hover:bg-gray-100 dark:border-none dark:bg-gray-600 dark:border-gray-700 dark:hover:bg-gray-500"
            :class="theme === 'dark' ? 'text-blue-400' : 'text-gray-700 dark:text-gray-300'"
        >
            <span class="sr-only">{{ __('Dark Theme') }}</span>

            <x-icons.moon class="w-10 h-10 sm:w-6 sm:h-6" />
        </button>

        <button
            type="button"
            x-on:click="setTheme('system')"
            class="border rounded-md shadow p-1 bg-white hover:bg-gray-100 dark:border-none dark:bg-gray-600 dark:border-gray-700 dark:hover:bg-gray-500"
            :class="theme === 'system' ? 'text-blue-400' : 'text-gray-700 dark:text-gray-300'"
        >
            <span class="sr-only">{{ __('System Theme') }}</span>

            <x-icons.computer-desktop class="w-10 h-10 sm:w-6 sm:h-6" />
        </button>
    </div>
</div>
