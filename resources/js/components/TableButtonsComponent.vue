<template>
    <div class="flex-div">
        <button class="btn btn-primary" :to="{ name: '{{row.type}}Profile', params: { id: row.id }}" @click="view(row)">View</button>
        <button class="btn btn-primary" :to="{ name: '{{row.type}}ProfileEdit', params: { id: row.id }}" @click="edit(row)">Edit</button>
        <button class="btn btn-primary" :to="{ name: '{{row.type}}ProfileDelete', params: { id: row.id }}" @click="del(row)">Delete</button>
    </div>
</template>

<script>
export default {
    props: {
        row: {
            type: Object
        }
    },
    methods: {
        view: function (e) {
            this.$router.push({
                name: e.type + 'Profile',
                params: {
                     id: e.id
                }
            });
        },
        edit: function (e) {
            this.$router.push({
                name: e.type + 'ProfileEdit',
                params: {
                     id: e.id
                }
            });
        },
        del: function (e) {
            console.log(e);
            var type = e.type;
            Vue.swal({
                title: "Delete this " + type + "?",
                text: "Are you sure? You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: true
            }).then((result) => {
                if (result.value) {
                    axios.delete('/' + type + '/' + e.id);

                    $(this.$el).fadeOut(300, () => {
                        this.$swal({
                            title: 'Success',
                            html: type.toUpperCase() +' deleted.',
                            showCloseButton: true,
                            focusConfirm: false,
                        }).then((result) =>{
                            if (result.value)
                                window.location.reload();
                        });
                    });
                }
            });            
        }
    }
}
</script>
<style scoped lang="scss">
    .flex-div{
        display: flex;
        justify-content: center;
    }
    .flex-div button{
        margin-right: 5px;
    }
</style>