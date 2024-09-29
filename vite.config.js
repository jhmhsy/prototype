import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        host: process.env.VITE_HOST,
        port: parseInt(process.env.VITE_PORT),
    },
});
//export const anotherServerConfig = defineConfig({
//    server: {
//        host: '192.168.1.9',
//        port: 8001
//    },
//    // Additional server configuration
//});
