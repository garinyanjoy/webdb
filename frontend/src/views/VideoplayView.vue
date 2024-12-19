<template>
  <div class="video-play-page">
    <Navbar />
    <!-- 视频播放区域 -->
    <div class="video-container">
      <video controls :src="videoSrc" width="100%" height="auto"></video>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import Navbar from '@/components/Navbar.vue';

// 获取路由参数中的 url
const props = defineProps({
  url: String  // 定义传递的 URL 参数
});

console.log('url 参数:', props.url);  // 打印 url 参数

const videoSrc = ref('');  // 使用 ref 来定义响应式的 videoSrc

onMounted(() => {
  // 在页面挂载时，通过 url 参数生成视频资源的路径
  console.log('url 参数:', props.url);  // 打印 url 参数

  // 使用 require 动态加载视频资源
  try {
    videoSrc.value = require(`@/${props.url}`);
  } catch (error) {
    console.error('视频加载失败:', error);
    videoSrc.value = '';  // 如果加载失败，给出错误提示
  }
});
</script>

<style scoped>
.video-play-page {
  padding: 20px;
}

.video-container {
  margin-bottom: 20px;
}
</style>
