const { merge } = require("webpack-merge");
const path = require("path")
const fs = require("fs")
const common = require("./webpack.common.js");
const TerserPlugin = require("terser-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// เขียนโหมด prod ลง config_env.txt
fs.writeFileSync(
  path.resolve(__dirname, "config/json/server_env.txt"),
  "prod"
);

process.env.NODE_ENV = "production";
module.exports = merge(common, {
  mode: "production",
  devtool: false,

  output: {
    filename: "js/[name].[contenthash].js", // ไม่ใช้ contenthash เพื่อเร่ง dev
    path: path.resolve(__dirname, "prod"), //
    clean: true,
  },
  
  plugins: [
    
    new CleanWebpackPlugin(), // ลบไฟล์เก่าก่อนการสร้างใหม่
    new MiniCssExtractPlugin({
      filename: "css/[name].css",
    }),
  ],
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        terserOptions: {
          compress: { drop_console: true }, // ลบ console.log ใน production
        },
      }),
      new CssMinimizerPlugin(),
    ],
    splitChunks: {
      chunks: "all", // แยกโค้ดที่ซ้ำกัน
      cacheGroups: {
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: "vendors",
          chunks: "all",
        },
      },
    },
  },
});
