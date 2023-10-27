<script setup>
import useLivros from "../../composables/livros";
import { onMounted } from "vue";

const { livros, getLivro } = useLivros();

onMounted(() => getLivro());
</script>

<template>
    
</template>