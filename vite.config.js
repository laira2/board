import { defineConfig } from 'vite';
import vue from "@vitejs/plugin-vue";
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import Components from 'unplugin-vue-components/vite';
import {PrimeVueResolver} from '@primevue/auto-import-resolver';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        Components({
        resolvers: [
            PrimeVueResolver()
        ]
    })
    ],
    server: {
        host: '127.0.0.1',
        port: 5174
    },
    resolve: name => {
        const pages = import.meta.glob('./resources/js/Pages/**/*.vue', { eager: true })
        return pages[`./resources/js/Pages/${name}.vue`]
    },

});
