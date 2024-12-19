const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  devServer: {
    host: '0.0.0.0',
    port: 8080,
    hot: true,
    client: {
      // 修改 WebSocket 配置
      webSocketURL: 'auto://0.0.0.0:0/ws'
    },
    watchFiles: {
      paths: ['src/**/*.*'],
      options: {
        usePolling: true,
        interval: 1000,
        ignored: /node_modules/
      }
    }
  }
})