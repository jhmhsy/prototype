import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        host: "192.168.100.198", // or use '0.0.0.0' to allow external connections
        port: 3000, // You can choose a different port if 3000 is in use
    },
});
