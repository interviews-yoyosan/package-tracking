<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" v-if="shipmentId">
                    <p>Shipment ID: {{ shipmentId }}</p>
                </div>

                <div v-if="hasData">
                    <div v-for="(value, key) in data"
                        v-if="!(key == 'created_at' || key == 'updated_at' || key == 'id')"
                        style="text-align: left"
                    >
                        <strong>{{ key | capitalize }}</strong>
                        <span>: {{ value | date }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            shipmentId: {
                default: 0
            },
            data: {
                default: []
            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''

                value = value.toString()
                value = value.split('_').join(' ')

                return value.charAt(0).toUpperCase() + value.slice(1)
            },
            date: function (value) {
                if (!value) return ''

                var date = Date.parse(value)
                if (!isNaN(date)) {
                    return new Date(date).toDateString()
                }

                return value
            }
        },
        computed: {
            hasData: function() {
                return this.data.hasOwnProperty('id')
            }
        }
    }

</script>

