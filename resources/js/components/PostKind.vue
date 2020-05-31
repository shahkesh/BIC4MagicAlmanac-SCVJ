<template>
    <div class="container">
        <div class="columns is-multiline">
            <div class="card column is-half is-offset-one-quarter">
                <header class="card-header">
                    <h1 class="card-header-title">
                        {{ title }}
                    </h1>
                </header>
                <div class="card-content">
                    <div class="content">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" v-model='name' name="name" placeholder="Kind Name">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Kind description" v-model="description" rows="10"/>
                            </div>
                        </div>
                        <div class="control">
                            <input type="submit" value="Add to DB" @click="addKind" class="button is-success is-rounded">
                        </div>
                        <br>
                        <div v-if="statusErr === 1" >
                            <article class="message is-danger">
                                <div class="message-body">
                                    This name is already assigned or/and no description has been added. <strong>Please try again!!!</strong>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                description: '',
                statusErr: 0
            }
        },
        methods: {
            addKind() {
                let name = this.name;
                let description = this.description;

                axios.post('/kind', {
                    name,
                    description
                })
                .then(response => {
                    console.log(response)})
                .catch(error => {
                    this.statusErr = 1,
                    console.log(error, error.status)
                });

                this.statusErr = 0;

                this.name = '';
                this.description = '';
            }
        }
    }
</script>

<style scoped>

</style>
