export const gulpConfig = {
    proxy: "www.bwp.loc/test-template-bwp",
    port: 3000,
    host: "localhost",
    paths: {
        styles: {
            main: "static/admin/scss/style.scss",
            src: "static/admin/scss/**/*.scss",
            dest: "static/admin/dist/",
        },
        scripts: {
            main: "static/admin/js/index.js",
            src: "static/admin/js/**/*.js",
            dest: "static/admin/dist/",
        },
        markup: {
            src: "**/*.{html,php}",
        },
        includes: {
            node_modules: ["./node_modules"],
        },
        cleanPatterns: {
            patterns: ["static/admin/dist"]
        }
    }
}
