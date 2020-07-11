const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = {
  mode: 'development',
  entry: {
    index: [
      './src/js/index.js',
    ],
    styles: [
      './src/scss/index.scss',
    ],
  },
  output: {
    path: __dirname + '/dist',
    filename: "[name].js"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          'style-loader',
          MiniCssExtractPlugin.loader,
          // Creates `style` nodes from JS strings
          // Translates CSS into CommonJS
          'css-loader',
          // Compiles Sass to CSS
          'sass-loader',
        ],
      },
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: `[name].css`,
    }),
    new BrowserSyncPlugin({
      // browse to http://localhost:3000/ during development,
      // ./public directory is being served
      host: 'localhost',
      port: 3000,
      proxy: 'http://wordpress-starter.test',
    }),
    // from https://gist.github.com/wpscholar/cba13d48ff11fd2c84e5542e70e9a091
    function (compiler) {
      // Custom webpack plugin - remove generated JS files that aren't needed
      compiler.hooks.emit.tap('RemoveEmptyJsFiles', function (compilation) {
        compilation.chunks.forEach(chunk => {
          if (!chunk.entryModule._identifier.includes('.js')) {
            chunk.files.forEach(file => {
              if (file.includes('.js')) {
                delete compilation.assets[file];
              }
            });
          }
        });
      });
    },
  ]
};
