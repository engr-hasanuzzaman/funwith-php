import axios from "axios";
import { onMounted, reactive } from "vue"

export const useTodos = () => {
    const todos = reactive({
        search: null,
        list: [],
    });
    const fetchTodos = async () => {
        const resp = await axios.get('https://jsonplaceholder.typicode.com/posts') as [];
        todos.list = resp;
    }
    onMounted(fetchTodos);

    return {
        todos,
        fetchTodos
    }
}