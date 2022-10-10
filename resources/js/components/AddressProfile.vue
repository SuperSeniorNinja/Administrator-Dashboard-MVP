<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Address Profile View</div>

                    <div class="card-body">
                        <h4>Address: &nbsp;<h4 v-html="address.full_address"> {{address.full_address}}</h4></h4>
                        <h4>Number of Associated Cars: &nbsp;{{address.cars_count}}</h4>
                        <h4>Owner: &nbsp;{{address.owner}}</h4>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'AddressProfile',
    data() {
        return {
            address: []
        }
    },
    methods: {
        showAddress: function () {
             axios.get("/address/" + this.$route.params.id)
            .then(function (res) {
                console.log(res);
                    this.address = res.data;
                }.bind(this));
        }
    },
    created: function () {
        this.showAddress();
    }
}
</script>
<style scoped lang="scss">
    .card-body h4:first-child{
        display: flex;
    }
</style>