<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Owner Profile Edit</div>

                    <div class="card-body">
                        <form id="owner_edit_form" class="owner_edit_form" method="PUT">
                            <h4>First Name: &nbsp;
                                <input
                                  class="input mt-2"
                                  id="first_name"
                                  v-model="owner.first_name"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Last Name: &nbsp;
                                <input
                                  class="input mt-2"
                                  id="last_name"
                                  v-model="owner.last_name"
                                  @change="changeInput"
                                />
                            </h4>
                            <h4>Number of Addresses: &nbsp;{{owner.addresses_count}}</h4>
                            <h4>Number of Associated Cars: &nbsp;{{owner.cars_count}}</h4>
                            <button
                              type="button"
                              class="btn btn-secondary"
                              @click="saveOwner"
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
    name: 'OwnerProfileEdit',
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
        },
        saveOwner: function () {
            axios.put("/owner/" + this.$route.params.id, this.owner)
            .then(function (res) {
                this.$router.push({ name: "owners" });
            }.bind(this));
        },
        changeInput() {
          if (!this.touched) {
            this.touched = true;
          }
        }
    },
    created: function () {
        this.showOwner();
    }
}
</script>
<style scoped lang="scss">
    .card-body input{
        padding: 5px;
    }
</style>