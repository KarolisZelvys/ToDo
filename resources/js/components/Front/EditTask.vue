<template>
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="submit">
                <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" />
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" />
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="close" class="btn btn-secondary">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fields: {},
                errors: {},
            }
        },
        methods: {
            submit() {
                this.errors = {};
                axios.post('/submit', this.fields).then(response => {
                    alert('Message sent!');
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
            },
            close() {
                this.editTask = false;
            }
        },
    }
</script>

<style scoped>
    body {
        overflow: hidden;
    }
    #exampleModal {
        background-color: rgba(0, 0, 0, 0.3)
    }
</style>
