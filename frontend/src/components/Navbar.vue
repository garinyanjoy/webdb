<script setup>

</script>

<template>
  <nav class="navbar">
    <!-- 右侧部分 -->
    <div class="navbar-right">
      <router-link class="nav-link" to="/videos">视频</router-link>
      <router-link class="nav-link" to="/model">大模型体验</router-link>
      <router-link class="nav-link" to="/login">登录</router-link>
      <router-link class="nav-link" to="/msg">留言板</router-link>
    </div>
  </nav>
</template>

<style scoped>
/* 导航栏样式 */
.navbar {
  display: flex; /* 使用 Flexbox 布局 */
  justify-content: center; /* 子元素水平居中 */
  align-items: center; /* 子元素垂直居中 */
  position: relative; /* 允许子元素用绝对定位调整 */
  padding: 10px 20px;
  background-color: #A6CFBB; /* 导航栏背景颜色 */
  border-bottom: 1px solid #ddd;
}

/* 右侧部分 */
.navbar-right {
  margin-left: auto; /* 将右侧内容推到最右边 */
  display: flex;
  gap: 15px; /* 图标之间的间距 */
}

/* 去除默认的下划线和设置样式 */
.nav-link {
  text-decoration: none; /* 去掉下划线 */
  color: #275F43; /* 设置字体颜色 */
  font-size: 18px; /* 设置字体大小 */
  font-family: 'Arial', sans-serif; /* 设置字体 */
  transition: color 0.3s ease; /* 添加颜色过渡效果 */
}

/* 激活状态样式 */
.router-link-active {
  font-weight: bold; /* 激活链接加粗 */
}
</style>