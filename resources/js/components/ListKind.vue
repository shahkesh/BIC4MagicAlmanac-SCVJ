<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>CREATED_AT</th>
                    <th>UPDATED_AT</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="kind in kinds">
                    <td>{{kind.id}}</td>
                    <td>{{kind.slug}}</td>
                    <td>{{kind.name}}</td>
                    <td>{{kind.description}}</td>
                    <td>{{kind.created_at}}</td>
                    <td>{{kind.updated_at}}</td>
                </tr>
            </tbody>
        </table>

    </div>

</template>

<script>
    export default {
        data: function () {
            return{
                kinds:[]
            }
        },
        mounted() {
            console.log("List Kind mounted")
            axios.get('/list/kind')
            .then(response => {
                this.kinds = response.data
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
