const mix = require("laravel-mix");
const path = require("path");

mix
  .js("resources/js/app.js", "public/js")
  .postCss("resources/css/app.css", "public/css/app.css", [
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
          use: "svelte-loader",
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
