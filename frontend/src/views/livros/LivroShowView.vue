<script setup>
import useLivros from "../../composables/livros";
import { onMounted } from "vue";

const { livro, getLivro, errors, destroyLivro } = useLivros();

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
});

onMounted(() => getLivro(props.id));
</script>

<template>
  <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
    <h5 class="text-2xl font-bold tracking-tight text-gray-900">
      {{ livro.titulo }}
    </h5>
    <h4 class="mb-3 text-l font-medium tracking-tight text-gray-900">
      {{ livro.autor }}
    </h4>
    <h4 class="mb-3 text-l font-medium tracking-tight text-gray-900">
      {{ livro.classificacao + '/5' }}
    </h4>
    <p class="mb-3 font-normal text-gray-700">{{ livro.resenha }}</p>
    <p class="mb-3 text-sm font-normal text-gray-700">{{ livro.criado_em }}</p>
    <div class="space-x-2">
      <routerLink
        :to="{ name: 'edit', params: { id: livro.id } }"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
      >
        Editar
      </routerLink>
      <button
        @click="destroyLivro(livro.id)"
        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"
      >
        Deletar
    </button>
    </div>
  </div>
</template>
