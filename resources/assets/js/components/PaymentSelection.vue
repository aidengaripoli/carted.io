<template>
    <div>
        <div
            v-if="loading"
            class="loading">
            <p>Loading...</p>
        </div>
        <div
            v-else
            v-for="(source, index) in sources"
            :key="index"
            class="panel"
        >
            <div class="panel-heading">Saved Payment Methods</div>
            <a
                class="panel-block"
                :class="{ 'is-active': source === selectedSource }"
                @click="selectedSource = source"
            >
                {{ source.brand }} - **** **** **** {{ source.last4 }} - {{ source.exp_month }} - {{ source.exp_year }}
            </a>
        </div>
        <button
            class="button is-primary is-fullwidth"
            :class="{ 'is-loading': loading }"
            @click="pay"
        >
            Pay {{ amount | dollar }}
        </button>
    </div>
</template>

<script>
    /* global Cartedio */
    import axios from 'axios'

    export default {
        filters: {
            dollar (amount) {
                return `$${amount / 100}`
            }
        },

        props: {
            url: {
                type: String,
                required: true
            },
            amount: {
                type: Number,
                required: true
            }
        },

        data () {
            return {
                user: Cartedio.user,
                sources: [],
                selectedSource: null,
                loading: false
            }
        },

        created () {
            this.loading = true
            axios.get('/cards', { withCredentials: true })
                .then(({ data }) => {
                    this.loading = false
                    this.sources = data
                })
        },

        methods: {
            async pay () {
                this.loading = true
                try {
                    const res = await axios.post(this.url,
                        { source: this.selectedSource.id },
                        { withCredentials: true }
                    )
                    console.log(res)
                    this.$emit('success')
                } catch (err) {
                    console.log(err)
                    this.$emit('fail', err)
                } finally {
                    this.loading = false
                }
            }
        }
    }
</script>
