const path = require("path");
const webpack = require("webpack");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const local = require("json-loader!./../../public/json/msg-th.json");

// const { main } = require("@popperjs/core");
const isProduction = process.env.NODE_ENV === "production";

let pageWebpackOptionConfig = {
  title: local.page._title,
  inject: true,
  mobile: true,
  lang: "th-TH",
  favicon: path.join(__dirname, "src/images/favicon.ico"),
  meta: [
    { charset: "utf-8" },
    { "http-equiv": "X-UA-Compatible", content: "IE=edge" },
    {
      name: "viewport",
      content: "width=device-width, initial-scale=1",
    },
    // { name: "theme-color", content: "#00a6f4" },
    { name: "keywords", content: "meta tag for keywords" },
    {
      name: "description",
      content: "-",
    },
  ],
};

module.exports = {
  entry: {
    main: "./src/js/main.js",
    loginus: {
      dependOn: "main",
      import: path.resolve(__dirname, "./src/js/loginus.js"),
    },
    indexus: {
      dependOn: "main",
      import: path.resolve(__dirname, "./src/js/indexus.js"),
    },
    indexam: {
      dependOn: "main",
      import: path.resolve(__dirname, "./src/js/indexam.js"),
    },
  },

  output: {
    path: path.resolve(__dirname, "dist"), // ใช้ dist เสมอ
    // filename: "bundle.js",
    clean: true, // ลบไฟล์เก่าก่อน build ใหม่
  },
  plugins: [
    // new BundleAnalyzerPlugin(), //เพิ่มเข้าไป
    new webpack.ProvidePlugin({
      Swal: "sweetalert2", // ทำให้ `Swal` พร้อมใช้งานในทุกไฟล์
    }),
    // new CopyWebpackPlugin({
    //   patterns: [
    //     {
    //       from: path.resolve(
    //         __dirname,
    //         "node_modules/@fortawesome/fontawesome-free/webfonts"
    //       ),
    //       to: "fonts", // คัดลอกไปที่โฟลเดอร์ 'dist/webfonts'
    //     },
    //   ],
    // }),
    // new CopyWebpackPlugin({
    //   patterns: [
    //     {
    //       from: path.resolve(__dirname, "./src/assets"),
    //       to: "assets", // คัดลอกไปที่โฟลเดอร์ 'dist/webfonts'
    //     },
    //   ],
    // }),
    new CopyWebpackPlugin({
      patterns: [
        { from: "./src/images", to: "images" },
        { from: "./src/php/server", to: "includes/server" },
        // { from: "./src/icons", to: "icons" },

        // { from: "./src/php/header", to: "header" },
        // { from: "./src/php/server", to: "server" },
        // {
        //   from: "./src/php/user/session_login.php",
        //   to: "session_user_login.php",
        // },
        // {
        //   from: "./src/php/user/session_logout.php",
        //   to: "session_user_logout.php",
        // },
        // {
        //   from: "./src/php/admin/session_login_add.php",
        //   to: "session_add_login.php",
        // },
        // {
        //   from: "./src/php/admin/session_logout_add.php",
        //   to: "session_add_logout.php",
        // },

        // { from: "./src/excel", to: "excel" }, // คัดลอกไฟล์จาก src/excel ไปยัง dist/excel
        // { from: "./src/cert/cacert.pem", to: "cert/cacert.pem" },

        // { from: "public/json", to: "includes/json" },
        // {
        //   from: "./src/php/admin/edutrust_admin.php",
        //   to: "edutrust_admin.php",
        // },
        // { from: "./sso.php", to: "sso.php" },
        // { from: "config", to: "includes/config" },
      ],
    }),

    new HtmlWebpackPlugin({
      ...pageWebpackOptionConfig,
      filename: "index.php", // ชื่อไฟล์ที่สร้างใน dist/
      templateParameters: {
        pageTitle: local.page.index,
      },
      template: path.join(__dirname, "./src/php/user/thaid.php"), // ไฟล์ header.php
      inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
      chunks: ["main"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
      // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    }),
    new HtmlWebpackPlugin({
      ...pageWebpackOptionConfig,
      filename: "login.php", // ชื่อไฟล์ที่สร้างใน dist/
      templateParameters: {
        pageTitle: local.page.loginus,
      },
      template: path.join(__dirname, "./src/php/login.php"), // ไฟล์ header.php
      inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
      chunks: ["main", "loginus"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
      // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    }),

    new HtmlWebpackPlugin({
      ...pageWebpackOptionConfig,
      filename: "logout.php", // ชื่อไฟล์ที่สร้างใน dist/
      templateParameters: {
        pageTitle: local.page.logout,
      },
      template: path.join(__dirname, "./src/php/logout.php"), // ไฟล์ header.php
      inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
      chunks: ["main"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
      // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    }),

    new HtmlWebpackPlugin({
      ...pageWebpackOptionConfig,
      filename: "indexus.php", // ชื่อไฟล์ที่สร้างใน dist/
      templateParameters: {
        pageTitle: local.page.indexus,
      },
      template: path.join(__dirname, "./src/php/user/indexus.php"), // ไฟล์ header.php
      inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
      chunks: ["main", "indexus"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
      // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    }),

    new HtmlWebpackPlugin({
      ...pageWebpackOptionConfig,
      filename: "indexam.php", // ชื่อไฟล์ที่สร้างใน dist/
      templateParameters: {
        pageTitle: local.page.indexam,
      },
      template: path.join(__dirname, "./src/php/admin/indexam.php"), // ไฟล์ header.php
      inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
      chunks: ["main", "indexam"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
      // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    }),

    new HtmlWebpackPlugin({
      ...pageWebpackOptionConfig,
      filename: "header.php", // ชื่อไฟล์ที่สร้างใน dist/
      templateParameters: {
        pageTitle: local.page.index,
      },
      template: path.join(__dirname, "./src/php/admin/header.php"), // ไฟล์ header.php
      inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
      chunks: ["main"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
      // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    }),

    new HtmlWebpackPlugin({
      ...pageWebpackOptionConfig,
      filename: "profilebook.php", // ชื่อไฟล์ที่สร้างใน dist/
      templateParameters: {
        pageTitle: local.page.profile,
      },
      template: path.join(__dirname, "./src/php/admin/profilebook.php"), // ไฟล์ header.php
      inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
      chunks: ["main"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
      // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    }),

    // new HtmlWebpackPlugin({
    //   ...pageWebpackOptionConfig,
    //   filename: "filebook.php", // ชื่อไฟล์ที่สร้างใน dist/
    //   templateParameters: {
    //     pageTitle: local.page.filebook,
    //   },
    //   template: path.join(__dirname, "./src/php/filebook.php"), // ไฟล์ header.php
    //   inject: true, // ป้องกันการเพิ่ม <script> อัตโนมัติ
    //   chunks: ["main"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    //   // chunks: ["index", "system"], // ใส่เฉพาะบันเดิลที่ต้องการในหน้า index.html
    // }),
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          isProduction ? MiniCssExtractPlugin.loader : "style-loader",
          "css-loader",
          "sass-loader",
          {
            loader: "sass-loader",
            options: {
              sassOptions: {
                includePaths: ["node_modules"],
              },
            },
          },
        ],
      },
      {
        test: /\.css$/,
        use: [
          isProduction ? MiniCssExtractPlugin.loader : "style-loader",
          "css-loader",
          "postcss-loader",
        ],
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
        },
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        type: "asset/resource",
        generator: {
          filename: "fonts/[name][ext]",
        },
      },
      {
        test: /\.(png|jpg|jpeg|gif|svg)$/i,
        type: "asset/resource",
        generator: {
          filename: "images/[name][ext]",
        },
      },
    ],
  },
  resolve: {
    alias: {
      jquery: "jquery/src/jquery",
      "@scss": path.resolve(__dirname, "src/scss"),
    },
    extensions: [".js", ".json", ".scss"],
    fallback: {
      jquery: require.resolve("jquery"),
    },
  },
  cache: {
    type: "filesystem",
    buildDependencies: {
      config: [__filename], // รีบิวด์ถ้าไฟล์ config เปลี่ยน
    },
    cacheDirectory: path.resolve(__dirname, ".temp_cache"), // โฟลเดอร์เก็บ cache (กำหนดเองได้)
    maxAge: 24 * 60 * 60 * 1000, // กำหนดให้ cache หมดอายุภายใน 1 วัน (optional)
  },
  // devtool: "source-map", // เปิดใช้ source map สำหรับการ debug
};