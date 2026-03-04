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
        host: "0.0.0.0", // Listen on all network interfaces
        cors: true,
        hmr: {
            host: "192.168.105.82", // Your specific machine IP
        },
    },
    resolve: {
        alias: {
            "@": "/resources/js",
        },
    },
});
