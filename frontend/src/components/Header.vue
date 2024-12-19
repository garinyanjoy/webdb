<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

// 图片名称数组（不包含路径部分）
const images = [
  '1.webp',
  '2.png',
  '3.webp',
  '4.jpg',
  '5.png'
];

const currentIndex = ref(0);

// 切换到下一张图片
const nextImage = () => {
  currentIndex.value = (currentIndex.value + 1) % images.length;
};

// 切换到上一张图片
const prevImage = () => {
  currentIndex.value = (currentIndex.value - 1 + images.length) % images.length;
};

// 自动播放功能
let interval;
onMounted(() => {
  // 每张图淡入淡出2秒，停顿5秒
  interval = setInterval(nextImage, 5000); // 5秒轮播时间
});

// 清理定时器
onUnmounted(() => {
  clearInterval(interval);
});
</script>

<template>
  <div class="carousel-container">
    <div class="carousel">
      <transition name="fade" mode="out-in">
        <img
            :key="currentIndex"
            :src="require(`@/assets/images/roll${images[currentIndex]}`)"
            alt="carousel image"
            class="carousel-image"
        />
      </transition>
    </div>

    <!-- 轮播图的左右切换按钮 -->
    <button class="prev" @click="prevImage">
      <img src="@/assets/left.png" alt="Previous" />
    </button>
    <button class="next" @click="nextImage">
      <img src="@/assets/right.png" alt="Next" />
    </button>
  </div>
</template>

<style scoped>
.carousel-container {
  padding: 20px 60px;
  position: relative;
  width: 900px; /* 轮播图的宽度 */
  height: 400px; /* 轮播图的高度 */
  overflow: hidden;
  margin: 0 auto;
}

.carousel {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.carousel-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 15px; /* 圆角 */
  transition: opacity 2s ease-in-out;
}

button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0);
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  z-index: 100;
}

.prev {
  left: 0;
}

.next {
  right: 0;
}

button img { width: 40px; height: 40px; }

/* 淡入淡出过渡 */
.fade-enter-active, .fade-leave-active {
  transition: opacity 2s ease-in-out;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>