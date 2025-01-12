const Encore = require('@symfony/webpack-encore');
const webpack = require('webpack');
const {copyFile} = require("yarn/lib/cli");

Encore
    .setOutputPath('./public/build')
    .setPublicPath('/build')
    .addEntry('app', './assets/app.js')
    .addStyleEntry('bootstrap', './assets/styles/bootstrap.scss')
    .addStyleEntry('styles', './assets/styles/style.css')
    .enableSassLoader()
    .enableSingleRuntimeChunk()
    .addPlugin(new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
        'window.$': 'jquery'
    }))
    .copyFiles({
        from: './assets/img',
        to: 'images/[path][name].[ext]',
        pattern: /\.(webp)$/,
    })
    .copyFiles({
        from: './assets/files',
        to: 'files/[path][name].[ext]',
        pattern: /\.(pdf)$/
    });

module.exports = Encore.getWebpackConfig();
