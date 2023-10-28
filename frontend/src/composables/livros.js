import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

axios.defaults.baseURL = "http://localhost:8000/api/";

export default function useLivros() {
  const livros = ref([]);
  const livro = ref({});
  const errors = ref([]);
  const router = useRouter();

  const getLivros = async () => {
    const response = await axios.get("livros");
    livros.value = response.data.data;
  };

  const createLivro = async (data) => {
      await axios.post("livros", data);
      await router.push({ name: "index" });
  };

  const getLivro = async (id) => {
    const response = await axios.get("livros/" + id);
    livro.value = response.data.data;
  };

  const updateLivro = async (id) => {
    try {
      await axios.put("livros/" + id, livro.value);
      await router.push({ name: "index" });
    } catch (error) {
      if (error.response.status === 422) {
        errors.value = error.response.data.errors;
      }
    }
  };

  const destroyLivro = async (id) => {
    await axios.delete("livros/" + id);
    await index();
  };

  return {
    livros,
    livro,
    errors,
    getLivro,
    createLivro,
    getLivros,
    updateLivro,
    destroyLivro,
  };
}
