import axios from "axios";
import { onMounted, reactive, watch, ref } from "vue"
type Comment = {
    "id": number;
    "body": string;
    "postIf": string;
  }
type Store = {
    search: string;
    comments: Comment[];
}
export const useComment = () => {
    const store = reactive<Store>({
        comments: [],
        search: ''
    })
    const fetchComments = async () => {
        const resp = await axios.get('https://my-json-server.typicode.com/engr-hasanuzzaman/fake-db/comments');
        store.comments = [...resp.data];
    }
    onMounted(fetchComments);
    return {
        store,
        fetchComments
    }
}