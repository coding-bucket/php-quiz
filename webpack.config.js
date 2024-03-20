const path = require('path');
const CopyPlugin = require("copy-webpack-plugin");

const config = {
    entry: {
        index: ['./client/index.js', './client/css/code-styles.scss', './client/css/styles.scss']
    },
    mode: 'production',
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            outputPath: 'css/', name: '[name].css'
                        }
                    },
                    {
                        loader: "sass-loader",
                    },
                ]
            },
        ]
    },
    plugins: [
        new CopyPlugin({
            patterns: [
                {from: "client/favicons", to: 'favicons'},
                {from: "client/favicon.ico", to: 'favicon.ico'},
                {from: "client/img", to: 'img'},
            ],
        }),
    ],
devtool: 'source-map',
}

const outputPaths = ["public", "docs"]

module.exports = outputPaths.map(outputPath => {
    return {
        ...config,
        name: outputPath,
        output: {
            filename: '[name].bundle.js',
            path: path.resolve(__dirname, outputPath)
        }
    }
})
