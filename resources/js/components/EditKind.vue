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
                        <div v-if="kind" >
                            <div class="field">
                                <label class="label">Slug</label>
                                <div class="control">
                                    <input class="input" type="text" v-model="kind.slug" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input class="input" type="text" v-model="kind.name">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Description</label>
                                <div class="control">
                                    <textarea class="textarea" v-model="kind.description"/>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label-small">Updated am {{kind.updated_at}}</label>
                                </div>
                            </div>
                            <div class="control">
                                <input type="submit" value="Cancel" @click="cancelKind" class="button is-dark is-rounded">
                                <input type="submit" value="OK" @click="updateKind" class="button is-success is-rounded">
                            </div>
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
                kind: null,
            }
        },
        methods : {
            updateKind(){
                let name = this.kind.name;
                let description = this.kind.description;
                axios.put(`/kind/${this.kind.slug}`, {
                    name,
                    description
                })
                .then(response => {
                    window.location.href = '/kind/'})
                .catch(error => {
                    console.log(error, error.status)});
            },
            cancelKind(){
                window.location.href = '/kind/';
            }
        },
        created() {
            let urlElement  =  window.location.pathname.split('/');
            let kindElement = urlElement[2];

            axios.get('/list/kind')
            .then(response => {
                for (let idx = 0; idx < response.data.length; idx++) {
                    if (kindElement == response.data[idx].slug){
                        this.kind = response.data[idx];
                    }
                }
            })
            .catch(error => {
                console.log(error, error.status)});
        }
    }
</script>

<style scoped>

</style>
