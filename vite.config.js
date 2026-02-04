import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import forms from "@tailwindcss/forms";
import containerQueries from "@tailwindcss/container-queries";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss({
            plugins: [forms, containerQueries],
        }),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
