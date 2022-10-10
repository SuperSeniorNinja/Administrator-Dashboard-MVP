<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Car Profile View</div>

                    <div class="card-body">                        
                        <h4>Make: &nbsp;{{car.make}}</h4>
                        <h4>Model: &nbsp;{{car.model}}</h4>
                        <h4>Year: &nbsp;{{car.year}}</h4>
                        <h4>Owner: &nbsp;{{car.owner}}</h4>
                        <h4>Address: &nbsp;<h4 v-html="car.full_address"> {{car.full_address}}</h4></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'CarProfile',
    data() {
        return {
            car: []
        }
    },
    methods: {
        showCar: function () {
             axios.get("/car/" + this.$route.params.id)
            .then(function (res) {
                    this.car = res.data; 
                }.bind(this));
        }
    },
    created: function () {
        this.showCar();
    }
}
</script>
<style scoped lang="scss">
    .card-body h4:last-child{
        display: flex;
    }
</style>