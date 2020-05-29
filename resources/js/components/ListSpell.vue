<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Name</th>
                <th>Quote</th>
                <th>Description</th>
                <th>Kind_ID</th>
                <th>CREATED_AT</th>
                <th>UPDATED_AT</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="spell in spells">
                <td>{{spell.id}}</td>
                <td>{{spell.slug}}</td>
                <td>{{spell.name}}</td>
                <td>{{spell.quote}}</td>
                <td>{{spell.description}}</td>
                <td>{{spell.kind_id}}</td>
                <td>{{spell.created_at}}</td>
                <td>{{spell.updated_at}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        data: function () {
            return{
                spells:[]
            }
        },
        mounted() {
            console.log("List Spell mounted")
            axios.get('/list/spell')
                .then(response => {
                    this.spells = response.data
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
</script>

<style scoped>

</style>
