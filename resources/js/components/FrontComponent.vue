<template>
    <div class="container" :class="{ 'loading': loading }">
        <div class="row" v-if="!loading">
            <div class="row col-12 mb-4">
                <task-status
                    v-for="status in statuses"
                    :key="status.id"
                    :status="status"
                    :selected-category="selectedCategory"
                    @load-products="loadTasks"
                ></task-status>
            </div>
            <div class="col-12">
                <div class="list-group">
                    <tasks
                        v-for="task in tasks"
                        :key="task.id"
                        :task="task"
                        @load-products=""
                    ></tasks>
                </div>

            </div>
<!--            <div class="col-lg-9">-->
<!--                <div class="row mt-4">-->
<!--                    <product v-for="product in products" :key="product.id" :product="product"></product>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <the-pagination :pagination-data="paginationData" @change-page="changePage"></the-pagination>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                statuses: [],
                tasks: [],
                // products: [],
                // paginationData: {},
                selectedCategory: null,
                currentPage: 1,
                loading: true
            };
        },
        mounted () {
            this.loadTasks();
            this.loadStatuses();
            // this.loadProducts();
        },
        methods: {
            loadTasks: function () {
                axios.get('/api/tasks')
                    .then((response) => {
                        this.tasks = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
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
            // loadProducts: function (category = null, page = 1) {
            //     this.loading = true;
            //     this.selectedCategory = category;
            //     this.currentPage = page;
            //     axios.get('/api/products', {
            //         params: {
            //             category,
            //             page
            //         }
            //     })
            //         .then((response) => {
            //             const {data, ...pagination} = response.data;
            //             this.products = data;
            //             this.paginationData = pagination;
            //             this.loading = false;
            //         })
            //         .catch(function (error) {
            //             console.log(error);
            //         });
            // },
            // changePage: function (page) {
            //     console.log('asdasd');
            //     this.loadProducts(this.selectedCategory, page);
            // }
        }
    }
</script>

<style>
</style>
