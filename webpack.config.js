const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addStyleEntry('bootstrap', './assets/styles/bootstrap.scss')
    .addStyleEntry('styles', './assets/styles/style.css')
    .enableSassLoader()
    .enableSingleRuntimeChunk();

module.exports = Encore.getWebpackConfig();
