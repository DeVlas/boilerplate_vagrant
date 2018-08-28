const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const NewHtmlWebpackPlugin = require('html-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const DashboardPlugin = require('webpack-dashboard/plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');

module.exports = {
    mode: process.env.NODE_ENV || 'development',
    entry: './src/index.js',
    output: {
        filename: 'application.js',
        path: path.resolve(__dirname, 'dist')
    },
    devtool: 'eval-source-map',
    module: {
        rules: [
            {
                enforce: 'pre',
                test: /\.(js|vue)$/,
                loader: 'eslint-loader',
                exclude: /node_modules/,
                options: {}
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    extractCSS: true,
                    loaders: {
                        i18n: '@kazupon/vue-i18n-loader'
                    }
                }
            },
            {
                test: /\.(sa|sc|c)?ss$/,
                use: [
                    {
                        loader: this.mode === 'production' ? MiniCssExtractPlugin.loader : 'style-loader'
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'resolve-url-loader'
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            data: '@import "assets/stylesheets/config.scss";'
                        }
                    }

                ]
            },
            {
                include: path.join(__dirname, '/src/assets/images'),
                test: /\.(jpg|png|svg|gif)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'images/'
                        }
                    }
                ]

            },
            {
                include: path.join(__dirname, '/src/assets/fonts'),
                test: /\.(woff2?|eot|ttf|otf|svg)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'fonts/'
                        }
                    }
                ]

            },
            {
                test: /\.js$/,
                exclude: file => (
                    /node_modules/.test(file) &&
                    !/\.vue\.js/.test(file)
                ),
                include: path.join(__dirname, '/src'),
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                        plugins: ['@babel/plugin-transform-runtime']
                    }
                }
            }
        ]
    },
    plugins: [
        new StyleLintPlugin({
            files: ['**/*.{vue,htm,html,css,sss,less,scss,sass}'],
            syntax: 'scss',
            rules: {
                indentation: 4,
                'at-rule-no-unknown': null,
                'scss/at-rule-no-unknown': true
            }
        }),
        new CleanWebpackPlugin('dist', {
            verbose: true
        }),
        new VueLoaderPlugin(),
        new NewHtmlWebpackPlugin({
            hash: true,
            template: 'src/index.html',
            files: {
                css: ['main.css']
            }
        }),
        new webpack.HotModuleReplacementPlugin(),
        new MiniCssExtractPlugin({
            filename: '[name].css',
            chunkFilename: '[id].css'
        }),
        new DashboardPlugin({})
    ],
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: true,
                sourceMap: true,
                parallel: true
            })
        ]
    },
    resolve: {
        extensions: ['.vue', '*', '.js', '.json'],
        modules: ['node_modules', path.resolve(__dirname, 'src')],
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    },
    devServer: {
        contentBase: path.join(__dirname, '/dist'),
        hot: true,
        open: true,
        port: 8080,
        compress: true,
        historyApiFallback: true,
        host: '0.0.0.0',
        overlay: {
            warnings: true,
            errors: true
        }
    }
};
