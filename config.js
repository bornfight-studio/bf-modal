export const gulpConfig = {
    proxy: "www.bwp.loc/test-template-bwp",
    port: 3000,
    host: "localhost",
    paths: {
        styles: {
            main: "static/public/scss/style.scss",
            src: "static/public/scss/**/*.scss",
            dest: "static/public/dist/",
        },
        scripts: {
            main: "static/public/js/index.js",
            src: "static/public/js/**/*.js",
            dest: "static/public/dist/",
        },
        markup: {
            src: "**/*.{html,php}",
        },
        includes: {
            node_modules: ["./node_modules"],
        },
        cleanPatterns: {
            patterns: ["static/public/dist"]
        }
    }
}
