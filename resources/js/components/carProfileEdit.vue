<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Car Profile Edit</div>

                    <div class="card-body">
                        <form id="car_edit_form" class="car_edit_form" method="PUT">
                            <h4>Make: &nbsp;
                                <input
                                  class="input"
                                  id="make"
                                  v-model="car.make"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Model: &nbsp;
                                <input
                                  class="input"
                                  id="model"
                                  v-model="car.model"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Year: &nbsp;
                                <input
                                  class="input"
                                  id="year"
                                  v-model="car.year"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Owner: &nbsp;{{car.owner}}</h4>
                            <h4 class="flex-div">Address: &nbsp;<h4 v-html="car.full_address"> {{car.full_address}}</h4></h4>
                            <button
                              type="button"
                              class="btn btn-secondary"
                              @click="saveCar"
                            >
                                <span>Update</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'carProfileEdit',
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
        },
        saveCar: function () {
            axios.put("/car/" + this.$route.params.id, this.car)
            .then(function (res) {
                this.$router.push({ name: "cars" });
            }.bind(this));
        },
        changeInput() {
          if (!this.touched) {
            this.touched = true;
          }
        }
    },
    created: function () {
        this.showCar();
    }
}
</script>
<style scoped lang="scss">
    .flex-div{
        display: flex;
    }
    .card-body input{
        padding: 5px;
    }
</style>