<template>
    <div class="statistics_info">
        <h4>Average Number Of Addresses(per user): &nbsp;{{statistics.avarage_address_count}}</h4>
        <h4>Average Number Of Cars(per user): &nbsp;{{statistics.avarage_cars_count}}</h4>
    </div>
</template>

<script>
export default {
    name: 'OwnersStatisticsComponent',
    data() {
        return {
            statistics: []
        }
    },
    methods: {
        showOwnerStatistics: function () {
            axios.get("/owner_statistics")
            .then(function (res) {
                this.statistics = res.data;
            }.bind(this));
        }
    },
    created: function () {
        this.showOwnerStatistics();
    }
}
</script>

<style scoped lang="scss">
    .statistics_info{
        padding: 20px 0px;
    }
</style>