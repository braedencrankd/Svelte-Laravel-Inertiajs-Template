const autoprefixer = require("autoprefixer");
const mix = require("laravel-mix");
const path = require("path");
const cssImport = require("postcss-import");
const cssNesting = require("postcss-nesting");
const { sveltePreprocess } = require("svelte-preprocess/dist/autoProcess");
const tailwindcss = require("tailwindcss");

mix
  .js("resources/js/app.js", "public/js")
  .postCss("resources/css/app.css", "public/css/app.css", [
    cssImport(),
    cssNesting(),
    require("tailwindcss"),
  ])
  .webpackConfig({
    output: { chunkFilename: "js/[name].js?id=[chunkhash]" },
    resolve: {
      mainFields: ["svelte", "browser", "module", "main"],
      alias: {
        "@": path.resolve("resources/js"),
      },
    },
    module: {
      rules: [
        {
          test: /\.(html|svelte)$/,
          use: {
            loader: "svelte-loader",
            options: {
              emitCss: true,
              hotReload: true,
              hotOptions: {
                // whether to preserve local state (i.e. any `let` variable) or
                // only public props (i.e. `export let ...`)
                noPreserveState: false,
                // optimistic will try to recover from runtime errors happening
                // during component init. This goes funky when your components are
                // not pure enough.
                optimistic: true,

                // See docs of svelte-loader-hot for all available options:
                //
                // https://github.com/rixo/svelte-loader-hot#usage
              },
              preprocess: sveltePreprocess({
                postcss: {
                  plugins: [tailwindcss, autoprefixer],
                },
              }),
            },
          },
        },
        {
          // required to prevent errors from Svelte on Webpack 5+, omit on Webpack 4
          test: /node_modules\/svelte\/.*\.mjs$/,
          resolve: {
            fullySpecified: false,
          },
        },
      ],
    },
  });
