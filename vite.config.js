import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/assets/css/style.css', 'resources/js/app.ts'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js')
        },
    },
    build: {
        // Improve build performance
        target: 'es2015',
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
        // Optimize chunk size
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['vue', 'pinia', '@inertiajs/vue3'],
                    // Add other large dependencies here
                },
            },
        },
        // Split chunks
        chunkSizeWarningLimit: 1000,
        // Reduce build time
        sourcemap: false,
    },
    optimizeDeps: {
        include: ['vue', 'pinia', '@inertiajs/vue3'],
    },
});