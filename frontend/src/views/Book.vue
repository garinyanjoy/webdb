<script setup>
import { ref, onMounted } from 'vue';
import axios from '@/plugins/axios'; // 使用配置好的 axios 实例

const books = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('books');
    if (response.data.message === 'success') {
      books.value = response.data.data;
      console.log(books.value);
    } else {
      console.error('Failed to fetch books data');
    }
  } catch (error) {
    console.error('Error fetching data:', error);
  }
});
import Navbar from '@/components/Navbar.vue'

</script>

<template>
  <div>
    <Navbar />
    <table border="1" cellspacing="0" cellpadding="5">
      <thead>
      <tr>
        <th>编号</th>
        <th>图书名称</th>
        <th>作者</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="book in books" :key="book.id">
        <td>{{ book.id }}</td>
        <td>{{ book.name }}</td>
        <td>{{ book.author }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  text-align: left;
  padding: 8px;
}
th {
  background-color: #f2f2f2;
}
</style>
