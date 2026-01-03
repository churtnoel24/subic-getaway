import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/main.css','resources/css/contactMain.css'
                ,'resources/css/contentcss/about.css','resources/css/contentcss/attractions.css','resources/css/contentcss/contact.css','resources/css/contentcss/hotelpage.css'
                ,'resources/css/contentcss/hotels.css','resources/css/contentcss/news&events.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
