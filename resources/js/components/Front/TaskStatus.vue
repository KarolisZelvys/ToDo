<template>
    <div class="col-4">
        <a
            class="list-group-item"
            :class="{ 'active': selectedCategory == status.id }"
            @click="$emit('load-products', status.id)"
        >
            {{ status.name }}
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'status',
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
