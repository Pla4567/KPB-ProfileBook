const fs = require("fs");
const path = require("path");
const { merge } = require("webpack-merge");
// const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const common = require("./webpack.common.js");

// เขียนโหมด dev ลง config_env.txt
fs.writeFileSync(
  path.resolve(__dirname, "config/json/server_env.txt"),
  "dev"
);

process.env.NODE_ENV = "development";

module.exports = merge(common, {
  mode: "development",
  devtool: "inline-source-map",
  output: {
    // filename: "js/[name].js", // ไม่ใช้ contenthash เพื่อเร่ง dev
    filename: "js/[name].dev.js", // เปลี่ยนชื่อไฟล์เฉพาะ dev
    // path: path.resolve(__dirname, "dist"), // เปลี่ยน path เฉพาะ dev
    publicPath: "/KPB-ProfileBook/dist/",
    clean: true,
  },
  
  // plugins: [
  //   new MiniCssExtractPlugin({
  //     filename: "css/[name].css", // เปลี่ยนชื่อไฟล์เฉพาะ dev
  //     chunkFilename: "css/[name].css",
  //   })
  // ],

  devServer: {
    static: {
      directory: path.join(__dirname, "dist"), //ระบุให้ชัดเจนว่าหมายถึงไดเรกทอรีไหน
    },
    // compress: true,  //Webpack Dev Server และต้องการเปิดใช้งาน Gzip compression
    port: 3050, // กำหนดพอร์ตที่ต้องการ
    open: true, // เปิดเบราว์เซอร์อัตโนมัติ
    historyApiFallback: true, // การจัดการเส้นทางสำหรับ SPA
    hot: true, // เปิดใช้งาน Hot Module Replacement
  },
});
