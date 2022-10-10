<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Address Profile Edit</div>

                    <div class="card-body">
                        <form id="address_edit_form" class="address_edit_form" method="PUT">
                            <h4>Address: &nbsp;
                                <input
                                  class="input"
                                  id="address"
                                  v-model="address.address"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>City: &nbsp;
                                <input
                                  class="input"
                                  id="city"
                                  v-model="address.city"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Country: &nbsp;
                                <input
                                  class="input"
                                  id="country"
                                  v-model="address.country"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Postal Code: &nbsp;
                                <input
                                  class="input"
                                  id="postal_code"
                                  v-model="address.postal_code"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Number of Associated Cars: &nbsp;{{address.cars_count}}</h4>
                            <h4>Owner: &nbsp;{{address.owner}}</h4>
                            <button
                              type="button"
                              class="btn btn-secondary"
                              @click="saveAddress"
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
    name: 'AddressProfileEdit',
    data() {
        return {
            address: []
        }
    },
    methods: {
        showAddress: function () {
             axios.get("/address/" + this.$route.params.id)
            .then(function (res) {
                this.address = res.data;
            }.bind(this));
        },
        saveAddress: function () {
            axios.put("/address/" + this.$route.params.id, this.address)
            .then(function (res) {
                console.log(res);
                this.$router.push({ name: "addresses" });
            }.bind(this));
        },
        changeInput() {
          if (!this.touched) {
            this.touched = true;
          }
        }
    },
    created: function () {
        this.showAddress();
    }
}
</script>
<style scoped lang="scss">
    .card-body input{
        padding: 5px;
    }
</style>