let folder = 'public';
export const gulpConfig = {
    proxy: "www.bwp.loc/example-bwp",
    port: 3000,
    host: "localhost",
    paths: {
        styles: {
            main: "static/" + folder + "/scss/style.scss",
            src: "static/" + folder + "/scss/**/*.scss",
            dest: "static/" + folder + "/dist/",
        },
        scripts: {
            main: "static/" + folder + "/js/index.js",
            src: "static/" + folder + "/js/**/*.js",
            dest: "static/" + folder + "/dist/",
        },
        markup: {
            src: "**/*.{html,php}",
        },
        includes: {
            node_modules: ["./node_modules"],
        },
        cleanPatterns: {
            patterns: ["static/" + folder + "/dist"]
        }
    }
}
