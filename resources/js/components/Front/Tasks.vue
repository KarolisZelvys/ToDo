<template>
    <div class="col-4">
        <a
            class="list-group-item"
            :class="{ 'active': selectedCategory == task.id }"
            @click="$emit('load-products', task.id)"
        >
            {{ task.name }}
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'task',
            'selectedCategory'
        ]
    }
</script>

<style scoped>
    a {
        cursor: pointer;
    }
    a.active, a.active:hover {
        color: #fff;
    }
    a.active:hover {
        text-decoration: underline;
    }
</style>
