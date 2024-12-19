import axios from "axios";

// 创建 axios 实例
const service = axios.create({
  // baseURL: 'http://localhost:500/vue3-yii2/backend/web/index.php/', // 你的API地址
    baseURL: 'http://localhost:8000/api',
    timeout: 5000
});

// 请求拦截器
service.interceptors.request.use(
    config => {
      // 请求发送前的处理
      return config;
    },
    error => {
      return Promise.reject(error);
    }
);

// 响应拦截器
service.interceptors.response.use(
    response => {
      // 响应数据的处理
      return response;
    },
    error => {
      return Promise.reject(error);
    }
);

export default service;
