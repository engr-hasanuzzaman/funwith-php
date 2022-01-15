<template>
    <div>
        <h2>The list of todos are</h2>
        <div class="todo" v-for="todo in todos" :key="todo.id">
            <header>{{todo.title}}</header>
        </div>
    </div>
</template>

<script lang="ts">
import Vue, { defineComponent, onMounted, watch, ref } from 'vue';
import { useTodos} from '@/hooks/useTodo';

export default defineComponent({
    setup() {
        // const todos = ref<any>([]);
        const { todos, fetchTodos } = useTodos();
        watch(todos, (newVal, oldVal) => {
            debugger;
            // todos.value = newVal.list;
        });
        return  {
            todos
        }
    }
});
</script>