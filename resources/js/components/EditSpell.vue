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
                        <div v-if="spell" >
                            <div class="field">
                                <label class="label">Slug</label>
                                <div class="control">
                                    <input class="input" type="text" v-model="spell.slug" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input class="input" type="text" v-model="spell.name">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Quote</label>
                                <div class="control">
                                    <textarea class="textarea" v-model="spell.quote"/>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Description</label>
                                <div class="control">
                                    <textarea class="textarea" v-model="spell.description"/>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Kind_ID</label>
                                <div class="control">
                                    <input class="input" type="number" v-model="spell.kind_id">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label-small">Updated am {{spell.updated_at}}</label>
                                </div>
                            </div>
                            <div class="control">
                                <input type="submit" value="Cancel" @click="cancelSpell" class="button is-dark is-rounded">
                                <input type="submit" value="OK" @click="updateSpell" class="button is-success is-rounded">
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
                spell: null,
            }
        },
        methods : {
            updateSpell(){
                let name = this.spell.name;
                let quote = this.spell.quote;
                let description = this.spell.description;
                let kind_id = this.spell.kind_id;

                axios.put(`http://127.0.0.1:8000/spell/${this.spell.slug}`, {
                    name,
                    quote,
                    description,
                    kind_id
                })
                    .then(response => {
                        window.location.href = '/spell/'})
                    .catch(error => {
                        console.log(error, error.status)});
            },
            cancelSpell(){
                window.location.href = '/spell/';
            }
        },
        created() {
            let urlElement  =  window.location.pathname.split('/');
            let spellElement = urlElement[2];

            axios.get('/list/spell')
                .then(response => {
                    for (let idx = 0; idx < response.data.length; idx++) {
                        if (spellElement == response.data[idx].slug){
                            this.spell = response.data[idx];
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
