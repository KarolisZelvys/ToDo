<template>
    <div class="col-4">
        <a
            class="list-group-item"
            :style="{'background-color' : status.color }"
            :class="{ 'active': selectedStatus === status.id }"
            @click="$emit('load-tasks', status.id)"
        >
            {{ status.name }}
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'status',
            'selectedStatus'
        ]
    }
</script>

<style scoped>
    a {
        cursor: pointer;
    }
    a.active {
        color: #212529;
    }

    a.active:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 15px 15px 0 0;
        border-color: #333 transparent transparent transparent;
    }
</style>
