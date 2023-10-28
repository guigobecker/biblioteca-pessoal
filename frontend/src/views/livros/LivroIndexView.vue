<script setup>
import useLivros from "../../composables/livros";
import { onMounted } from "vue";

const { livros, getLivros } = useLivros();

onMounted(() => getLivros());
</script>

<template>
  <div>
    <div class="flex justify-end mb-2 pb-2">
      <RouterLink
        :to="{ name: 'create' }"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
        >Novo Livro</RouterLink
      >
    </div>
    <div class="max-w-7xl mx-auto">
      <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-center text-black mb-10">
          <tbody>
            <tr
              v-for="livro in livros"
              :key="livro.id"
              class="bg-white border-b hover:bg-gray-100"
            >
              <RouterLink
                :to="{ name: 'show', params: { id: livro.id } }"
                class="block"
              >
                <td class="px-6 py-4 text-center">
                  {{ livro.titulo }}
                </td>
              </RouterLink>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
