<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Input field</div>

                    <div class="card-body">
                        <form @submit="formSubmit">
                            <strong>Name:</strong>
                            <input class="form-control" v-model="name"></input>
                            <strong>Description:</strong>
                            <textarea class="form-control" v-model="description"></textarea>

                            <button class="btn btn-success">Submit</button>
                        </form>
                        <strong>Output:</strong>
                        <pre>
                        {{output}}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name: '',
                description: '',
                output:''
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/kind', {
                    name: this.name,
                    description: this.description
                })
                .then(function (response) {
                    currentObj.output = response.data;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            }
        }
    }
</script>

<style scoped>

</style>
