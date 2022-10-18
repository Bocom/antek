import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/tags.js',
                'resources/css/components/snippet.css',
                'resources/css/components/tags.css',
            ],
            refresh: true,
        }),
    ],
});
