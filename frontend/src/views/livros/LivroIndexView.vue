<script setup>
import useLivros from "../../composables/livros";
import { onMounted } from "vue";

const { livros, getLivros } = useLivros();

onMounted(() => getLivros());
</script>

<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <tbody>
        <tr
          v-for="livro in livros"
          :key="livro.id"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
        >
          <RouterLink :to="{ name: 'show', params: { id: livro.id } }">
            <td class="px-6 py-4">
              {{ livro.id }}
            </td>
            <td class="px-6 py-4">
              {{ livro.titulo }}
            </td>
          </RouterLink>
        </tr>
      </tbody>
    </table>
  </div>
</template>
