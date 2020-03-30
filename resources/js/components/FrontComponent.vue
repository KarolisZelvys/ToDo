<template>
    <div class="container" :class="{ 'loading': loading }">
        <div class="row mb-4" v-if="!loading">
            <task-status
                v-for="status in statuses"
                :key="status.id"
                :status="status"
                :selected-status="selectedStatus"
                @load-tasks="changeStatus"
            ></task-status>
        </div>

        <div class="text-right" @click="changeSorting()">Sort by: Due date</div>

        <div id="accordion" v-if="!loading">
            <tasks
                v-for="task in tasks"
                :key="task.id"
                :task="task"
                :statuses="statuses"
                @load-task="loadTask(task.id)"
                @changeStatus="changeTaskStatus"
            ></tasks>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                statuses: [],
                tasks: [],
                editTask: false,
                selectedStatus: null,
                currentPage: 1,
                loading: true,
                sortingCode: 'asc',
            };
        },
        mounted () {
            this.loadTasks();
            this.loadStatuses();
        },
        methods: {
            changeStatus: function (status) {

                if (this.selectedStatus === status) {
                    this.selectedStatus = null;
                } else {
                    this.selectedStatus = status;
                }

                this.loadTasks();
            },
            changeSorting:function () {

                if (this.sortingCode === 'desc') {
                    this.sortingCode = 'asc';
                } else {
                    this.sortingCode = 'desc';
                }

                this.loadTasks();
            },
            loadTasks: function (status = this.selectedStatus, sorting = this.sortingCode) {
                this.loading = true;
                this.selectedStatus = status;

                axios.get('/api/tasks', {
                    params: {
                        status,
                        sorting
                    }
                })
                    .then((response) => {
                        this.tasks = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.loading = false;
            },
            loadStatuses: function () {
                this.loading = true;
                axios.get('/api/statuses')
                    .then((response) => {
                        this.statuses = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                this.loading = false;
            },
            changeTaskStatus: function(val) {
                this.loading = true;
                const {taskId, statusId} = val;
                axios.get('/api/taskStatusUpdate', {
                    params: {
                        taskId,
                        statusId
                    }
                })
                    .catch(function (error) {
                        console.log(error);
                    });

                this.loadTasks();
                this.loading = false;
            },
        }
    }
</script>

<style>
</style>
