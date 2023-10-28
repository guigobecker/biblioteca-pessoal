<script setup>
import { reactive } from "vue";
import useLivros from "../../composables/livros";
import { RouterLink } from "vue-router";

const { createLivro, errors } = useLivros();

const form = reactive({
  titulo: "",
  autor: "",
  classificacao: "",
  resenha: "",
});
</script>

<template>
  <div>
    <form
      action=""
      class="max-w-md mx-auto p-4 bg-white shadow-md rounded-md"
      @submit.prevent="createLivro(form)"
    >
      <div class="space-y-6">
        <div class="mb-6">
          <label
            for="titulo"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Título</label
          >
          <input
            type="text"
            id="titulo"
            v-model="form.titulo"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          />
          <div v-if="errors.name">
            <span class="text-sm text-red-400">{{ errors.name[0] }}</span>
          </div>
        </div>
        <div class="mb-6">
          <label
            for="autor"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Autor</label
          >
          <input
            type="text"
            id="autor"
            v-model="form.autor"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          />
          <div v-if="errors.autor">
            <span class="text-sm text-red-400">{{ errors.autor[0] }}</span>
          </div>
        </div>
        <div class="mb-6">
          <label
            for="classificacao"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Classificação</label
          >
          <input
            type="text"
            id="classificacao"
            v-model="form.classificacao"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          />
          <div v-if="errors.classificacao">
            <span class="text-sm text-red-400">{{ errors.classificacao[0] }}</span>
          </div>
        </div>

        <label
          for="resenha"
          class="block mb-2 text-sm font-medium text-gray-900"
          >Resenha</label
        >
        <textarea
          id="resenha"
          v-model="form.resenha"
          rows="4"
          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
        ></textarea>
        <div v-if="errors.resenha">
          <span class="text-sm text-red-400">{{ errors.resenha[0] }}</span>
        </div>
      </div>
      <button
        type="submit"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
      >
        Salvar
      </button>
    </form>
  </div>
</template>
