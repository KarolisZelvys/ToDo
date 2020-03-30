<template>
    <div class="card mb-2">
        <div class="card-header d-flex" :id="'heading-' + task.id">
            <h5 class="flex-grow-1 align-self-center mb-0 cursor-pointer">
                <div data-toggle="collapse" :data-target="'#body' + task.id" aria-expanded="true" :aria-controls="'body' + task.id">
                    {{ task.name }}
                </div>
            </h5>
            <div class="mr-4">
                Status:
                <select>
                    <option
                        v-for="status in statuses"
                        :value="status.id"
                        :selected="status.id === task.status_id"
                        @click="$emit('changeStatus', {'taskId' : task.id, 'statusId' : status.id})">
                            {{ status.name }}
                    </option>
                </select>
            </div>
            <div class="align-self-center">
                Due date: {{ task.due_date}}
            </div>
        </div>

        <div :id="'body' + task.id" class="collapse" :aria-labelledby="'heading-' + task.id" data-parent="#accordion">
            <div class="card-body">{{ task.description }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'task',
            'selectedCategory',
            'statuses',
            'status'
        ],
    }
</script>

<style scoped>
    .cursor-pointer {
        cursor: pointer;
    }
</style>
