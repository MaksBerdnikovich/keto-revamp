import {src, dest, watch, series, parallel} from 'gulp';
import yargs from 'yargs';
import gulpSass from "gulp-sass";
import nodeSass from "node-sass";
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify-es';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import imagemin from 'gulp-imagemin';
import del from 'del';
import browserSync from "browser-sync";
import zip from "gulp-zip";
import info from "./package.json";
import replace from "gulp-replace";

const PRODUCTION = yargs.argv.prod;
const server = browserSync.create();
const sass = gulpSass(nodeSass);

export const serve = done => {
    server.init({
        proxy: "http://localhost:8088",
        notify: false,
        online: true
    });
    done();
};
export const reload = done => {
    server.reload();
    done();
};
export const clean = () => del(['dist']);

export const styles = () => {
    return src('src/scss/style.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility: '*'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css/'))
    .pipe(server.stream());
};

export const scripts = () => {
    return src([
        'src/js/functions.js',
        'src/js/quiz.js',
        'src/js/summary.js',
        'src/js/email.js',
        'src/js/checkout.js',
        'src/js/upsell.js',
        'src/js/profile-redirect.js',
        'src/js/graph.js',
        'src/js/my-plan.js',
        'src/js/progress.js',
        'src/js/profile.js',
    ]).pipe(dest('dist/js'));
};

export const pluginsCss = () => {
    return src([
        'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
        'node_modules/@fancyapps/ui/dist/fancybox.css',
        'node_modules/selectric/public/selectric.css',
        'node_modules/@chenfengyuan/datepicker/dist/datepicker.min.css',
        'node_modules/round-slider/dist/roundslider.min.css',
        'node_modules/tippy.js/dist/tippy.css',
    ])
    //.pipe(concat('style.min.css'))
    .pipe(dest('dist/css/common'));
};

export const pluginsJs = () => {
    return src([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/owl.carousel/dist/owl.carousel.min.js',
        'node_modules/@fancyapps/ui/dist/fancybox.umd.js',
        'node_modules/selectric/public/jquery.selectric.min.js',
        'node_modules/validator/validator.min.js',
        'node_modules/@chenfengyuan/datepicker/dist/datepicker.min.js',
        'node_modules/round-slider/dist/roundslider.min.js',
        'node_modules/jquery-countdown/dist/jquery.countdown.min.js',
        'src/js/common/canvas.min.js',
        'node_modules/tippy.js/dist/tippy.umd.js',
        'node_modules/@popperjs/core/dist/umd/popper.min.js',
    ])
    //.pipe(concat('scripts.min.js'))
    //.pipe(gulpif(PRODUCTION, uglify()))
    .pipe(dest('dist/js/common'));
};

export const images = () => {
    return src('src/images/**/*.{jpg,jpeg,png,svg,gif,ico}')
        .pipe(imagemin())
        .pipe(dest('dist/images'));
};

export const copy = () => {
    return src(['src/**/*', '!src/{images,js,scss}', '!src/{images,js,scss}/**/*'])
        .pipe(dest('dist'));
};

export const compress = () => {
    return src([
        "**/*",
        "!node_modules{,/**}",
        "!vendor{,/**}",
        "!bundled{,/**}",
        "!src{,/**}",
        "!.babelrc",
        "!.gitignore",
        "!gulpfile.babel.js",
        "!package.json",
        "!package-lock.json",
    ]).pipe(
        gulpif(
            file => file.relative.split(".").pop() !== "zip",
            replace("_themename", info.name)
        )
    )
        .pipe(zip(`${info.name}.zip`))
        .pipe(dest('bundled'));
};

export const watchForChanges = () => {
    watch('src/scss/**/*.scss', styles);
    watch('src/images/**/*.{jpg,jpeg,png,svg,gif,ico}', series(images, reload));
    watch(['src/**/*', '!src/{images,js,scss}', '!src/{images,js,scss}/**/*'], series(copy, reload));
    watch('src/js/**/*.js', series(scripts, reload));
    watch("**/*.html", reload);
    watch("**/*.php", reload);
};

export const dev = series(clean, parallel(styles, scripts, pluginsCss, pluginsJs, images, copy), serve, watchForChanges);
export const build = series(clean, parallel(styles, scripts, pluginsCss, pluginsJs, images, copy), compress);
export default dev;