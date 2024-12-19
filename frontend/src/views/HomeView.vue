<!--<template>-->
<!--  <div class="home">-->
<!--    <router-link class="b_link" to="/video">-->
<!--      <button id="enter">START</button>-->
<!--    </router-link>-->
<!--  </div>-->
<!--</template>-->

<!--<style scoped>-->
<!--.home {-->
<!--  display: flex;-->
<!--  justify-content: center;-->
<!--  align-items: center;-->
<!--  height: 100vh;  /* 让容器占满整个视口高度 */-->
<!--}-->

<!--#enter {-->
<!--  width: 100px;       /* 设置按钮的宽度 */-->
<!--  height: 100px;      /* 设置按钮的高度 */-->
<!--  background-color: #A6CFBB; /* 设置按钮颜色，可以根据需要动态修改 */-->
<!--  color: white;-->
<!--  border: none;-->
<!--  border-radius: 50%;  /* 使按钮圆形 */-->
<!--  font-size: 16px;-->
<!--  cursor: pointer;-->
<!--  display: flex;-->
<!--  justify-content: center;-->
<!--  align-items: center;-->
<!--  transition: background-color 0.3s;-->
<!--}-->

<!--.b_link {-->
<!--  text-decoration: none; /* 去掉下划线 */-->
<!--  color: #275F43; /* 设置字体颜色 */-->
<!--  font-size: 20px; /* 设置字体大小 */-->
<!--  font-family: 'Arial', sans-serif; /* 设置字体 */-->
<!--  transition: color 0.3s ease; /* 添加颜色过渡效果 */-->
<!--}-->
<!--</style>-->

<!--<script setup>-->

<!--</script>-->

<template>
  <div class="home">
    <router-link class="b_link" to="/videos">
      <button id="enter">START</button>
    </router-link>
  </div>
</template>

<style scoped>
.home {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;  /* 让容器占满整个视口高度 */
}

#enter {
  width: 100px;       /* 设置按钮的宽度 */
  height: 100px;      /* 设置按钮的高度 */
  background-color: #A6CFBB; /* 设置按钮颜色，可以根据需要动态修改 */
  color: white;
  border: none;
  border-radius: 50%;  /* 使按钮圆形 */
  font-size: 16px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: background-color 0.3s;
  animation: scaleAnimation 2s infinite; /* 添加循环的动画 */
}

/* 鼠标悬停时停止动画 */
#enter:hover {
  animation-play-state: paused; /* 暂停动画 */
  background-color: #8EC6A1;  /* 悬停时改变按钮颜色 */
}

/* 定义动画：从原始尺寸到放大，再到缩小 */
@keyframes scaleAnimation {
  0% {
    transform: scale(1); /* 初始尺寸 */
  }
  50% {
    transform: scale(1.1); /* 放大 */
  }
  100% {
    transform: scale(1); /* 缩小回原始尺寸 */
  }
}

.b_link {
  text-decoration: none; /* 去掉下划线 */
  color: #275F43; /* 设置字体颜色 */
  font-size: 20px; /* 设置字体大小 */
  font-family: 'Arial', sans-serif; /* 设置字体 */
  transition: color 0.3s ease; /* 添加颜色过渡效果 */
}
</style>

<script setup>
</script>

