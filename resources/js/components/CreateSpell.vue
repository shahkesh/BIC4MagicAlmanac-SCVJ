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
                            <strong>Quote:</strong>
                            <textarea class="form-control" v-model="quote"></textarea>
                            <strong>Description:</strong>
                            <textarea class="form-control" v-model="description"></textarea>
                            <strong>Kind_ID:</strong>
                            <textarea class="form-control" v-model="kind_id"></textarea>

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
                quote: '',
                description: '',
                kind_id: '',
                output:''
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/spell', {
                    name: this.name,
                    quote: this.quote,
                    description: this.description,
                    kind_id: this.kind_id
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
