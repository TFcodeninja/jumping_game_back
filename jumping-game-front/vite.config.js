import { defineConfig } from "vite";

export default defineConfig({
    root: "./",
    publicDir: "public",
    build: {
        outDir: "dist",
        assetsDir: "assets",
    },
    server: {
        port: 3000,
        proxy: {
            "/api": {
                target: "http://localhost:8000",
                changeOrigin: true,
            },
        },
    },
});
