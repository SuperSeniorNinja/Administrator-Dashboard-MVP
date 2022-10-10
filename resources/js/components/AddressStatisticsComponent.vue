<template>
    <div class="statistics_info">
        <h4>Average Number Of Cars(per address): &nbsp;{{statistics.avarage_cars_count}}</h4>
    </div>
</template>

<script>
export default {
    name: 'AddressStatisticsComponent',
    data() {
        return {
            statistics: []
        }
    },
    methods: {
        showAddressStatistics: function () {
            axios.get("/address_statistics")
            .then(function (res) {
                this.statistics = res.data;
            }.bind(this));
        }
    },
    created: function () {
        this.showAddressStatistics();
    }
}
</script>

<style scoped lang="scss">
    .statistics_info{
        padding: 20px 0px;
    }
</style>