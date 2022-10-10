<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Owner Profile View</div>

                    <div class="card-body">                        
                        <h4>First Name: &nbsp;{{owner.first_name}}</h4>
                        <h4>Last Name: &nbsp;{{owner.last_name}}</h4>
                        <h4>Number of Addresses: &nbsp;{{owner.addresses_count}}</h4>
                        <h4>Number of Associated Cars: &nbsp;{{owner.cars_count}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'OwnerProfile',
    data() {
        return {
            owner: []
        }
    },
    methods: {
        showOwner: function () {
            axios.get("/owner/" + this.$route.params.id)
            .then(function (res) {
                this.owner = res.data;
            }.bind(this));
        }
    },
    created: function () {
        this.showOwner();
    }
}
</script>
<style scoped lang="scss">

</style>