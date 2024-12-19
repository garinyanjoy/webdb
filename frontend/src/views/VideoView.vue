<script setup>
import Header from '@/components/Header.vue'
import { ref, onMounted } from 'vue';
import axios from '@/plugins/axios'; // 使用配置好的 axios 实例
import Navbar from '@/components/Navbar.vue'

const videos = ref([]);
onMounted(async () => {
  try {
    const response = await axios.get('/videos');
    if(response.data.message === 'success') {
      videos.value = response.data.data;
      console.log("vd data: ",videos.value);
      console.log("vd data: ",videos.value[0]);
    } else {
      console.error('Failed to fetch videos data');
    }
  } catch (error) {
    console.error('Error fetching data:', error);
  }
});
</script>

<template>
  <div class="video">
    <Navbar />
    <Header />
    <div id="search">
      <h1>搜索栏</h1>
    </div>
    <div id="body">
      <!-- 第一行 -->
      <div class="row f_row">
        <div class="box" v-for="(video, index) in videos.slice(0, 3)" :key="'f_row-' + index">
          <router-link class="pic" to="/play">
<!--          <router-link class="pic" :to="{ path: '/play', query: { videoId: ${Video_URL} } }">-->
            <img :src="require(`@/${video.Picture_URL}`)" alt="" />
            <p class="video_title">{{video.Title}}</p>
          </router-link>
        </div>
      </div>

      <!-- 第二行 -->
      <div class="row s_row">
        <div class="box" v-for="(video, index) in videos.slice(3, 6)" :key="'s_row-' + index">
          <img :src="require(`@/${video.Picture_URL}`)" alt="" />
          <p class="video_title">{{video.Title}}</p>
        </div>
      </div>

      <!-- 第三行 -->
      <div class="row th_row">
        <div class="box" v-for="(video, index) in videos.slice(6, 9)" :key="'th_row-' + index">
          <img :src="require(`@/${video.Picture_URL}`)" alt="" />
          <p class="video_title">{{video.Title}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* 主体样式 */
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

#search {
  padding: 20px 40px; /* 上下 padding 为 20px，左右 padding 为 40px */
}

#body {
  display: grid;
  grid-template-rows: auto auto repeat(4, auto);
  gap: 20px; /* 行间距 */
  padding: 40px;
}

.row {
  display: grid;
  column-gap: 20px; /* 增大列间距 */
}

.f_row,.s_row,.th_row {
  grid-template-columns: repeat(3, 1fr); /* 4列 */
}

.box {
  display: flex;
  flex-direction: column; /* 子元素垂直排列 */
  background-color: #ffffff;
  position: relative;
  overflow: hidden; /* 确保放大时图片不会超出容器 */
  height: 300px; /* 示例高度 */
  transition: transform 0.3s ease; /* 平滑过渡效果（针对容器整体） */
}

.box img {
  flex: 0 0 80%; /* 固定图片占高度的 80% */
  width: 100%; /* 图片宽度占满容器 */
  object-fit: cover; /* 图片自适应裁剪 */
  border-radius: 15px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8); /* 添加阴影效果 */
  transition: transform 0.3s ease; /* 鼠标悬停时的平滑过渡效果 */
}

.box p {
  flex: 0 0 20%; /* 固定标题占高度的 20% */
  display: flex; /* 为标题本身设置弹性布局 */
  align-items: center; /* 垂直方向居中对齐 */
  justify-content: center; /* 水平方向居中对齐 */
  text-align: center; /* 文本居中对齐 */
  font-size: 16px;
  margin: 0; /* 移除默认 margin，避免高度错乱 */
}

/* 鼠标悬停效果 */
.box:hover img {
  transform: scale(1.05); /* 鼠标悬停时图片放大 */
}

.box:hover p {
  font-weight: bold; /* 鼠标悬停时文字加粗 */
}

.pic {
  all: unset; /* 重置所有样式 */
  display: contents; /* 让它只作为内容容器 */
}

iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}
</style>
