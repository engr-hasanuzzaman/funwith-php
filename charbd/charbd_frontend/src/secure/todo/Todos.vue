<template>
    <div>
        <h2>The list of todos are</h2>
        <div class="todo" v-for="todo in todos" :key="todo.id">
            <header>{{todo.title}}</header>
        </div>
        <hr>
        <h2>The list of todo's comments</h2>
        <div class="todo" v-for="comment in store.comments" :key="comment.id">
            <header>{{comment.body}}</header>
        </div>
    </div>
</template>

<script lang="ts">
import Vue, { defineComponent, onMounted, watch, ref } from 'vue';
import { useTodos} from '@/hooks/useTodo';
import { useComment} from '@/hooks/useComment';

export default defineComponent({
    setup() {
        // const todos = ref<any>([]);
        const { todos, fetchTodos } = useTodos();
        const { store } = useComment();
        watch(todos, (newVal, oldVal) => {
            // debugger;
            // todos.value = newVal.list;
        });
        return  {
            todos,
            store
        }
    }
});
</script>