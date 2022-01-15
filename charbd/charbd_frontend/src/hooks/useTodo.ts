import axios from "axios";
import { onMounted, reactive, watch, ref } from "vue"
type Todo = {
    "userId": number;
    "id": number;
    "title": string;
    "body": string;
  }
type Store = {
    search: string;
    list: Todo[];
}
export const useTodos = () => {
    const todos = ref<Todo[]>([]);
    const fetchTodos = async () => {
        const resp = await axios.get('https://my-json-server.typicode.com/engr-hasanuzzaman/fake-db/posts');
        todos.value = [...resp.data];
    }
    onMounted(fetchTodos);
    return {
        todos,
        fetchTodos
    }
}