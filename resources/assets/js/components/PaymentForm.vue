<template>
    <form @submit.prevent>
        <h2 class="is-size-5">Card Number</h2>
        <card-number
            class="stripe-element card-number"
            ref="cardNumber"
            :stripe="stripeKey"
            :options="stripeOptions"
            @change="number = $event.complete"
        />

        <h2 class="is-size-5">Expiration Date</h2>
        <card-expiry
            class="stripe-element card-expiry"
            ref="cardExpiry"
            :stripe="stripeKey"
            :options="stripeOptions"
            @change="expiry = $event.complete"
        />

        <h2 class="is-size-5">CVC</h2>
        <card-cvc
            class="stripe-element card-cvc"
            ref="cardCvc"
            :stripe="stripeKey"
            :options="stripeOptions"
            @change="cvc = $event.complete"
        />

        <button
            class="button is-primary is-fullwidth"
            :class="{ 'is-loading': loading }"
            @click="pay"
            :disabled="!complete"
        >
            Pay {{ amount | dollar }}
        </button>

        <p class="is-danger" v-if="status" v-text="status"></p>
    </form>
</template>

<script>
    /* global Cartedio */
    import {
        CardNumber,
        CardExpiry,
        CardCvc,
        createToken
    } from 'vue-stripe-elements-plus'
    import axios from 'axios'

    export default {
        components: { CardNumber, CardExpiry, CardCvc },

        filters: {
            dollar (amount) {
                return `$${amount / 100}`
            }
        },

        props: {
            amount: {
                type: Number,
                default: 0
            },
            url: {
                type: String,
                default: ''
            }
        },

        data () {
            return {
                complete: false,
                number: false,
                expiry: false,
                cvc: false,
                loading: false,
                stripeKey: Cartedio.stripeKey,
                token: null,
                status: false,
                stripeOptions: {
                    classes: {
                        focus: 'focus',
                        empty: 'empty',
                        invalid: 'invalid'
                    }
                }
            }
        },

        watch: {
            number () {
                this.update()
            },
            expiry () {
                this.update()
            },
            cvc () {
                this.update()
            }
        },

        methods: {
            update () {
                this.complete = this.number && this.expiry && this.cvc
            },

            pay () {
                this.loading = true
                createToken().then(async data => {
                    this.token = data.token.id
                    try {
                        await axios.post(this.url,
                            { token: this.token },
                            { withCredentials: true }
                        )
                        this.$emit('success')
                    } catch (err) {
                        // this.status = err.response.data.status
                        this.$emit('fail', err)
                    } finally {
                        this.loading = false
                    }
                })
            }
        }
    }
</script>

<style>
    .StripeElement {
        display: block;
        margin: 10px 0 20px 0;
        padding: 10px 14px;
        box-shadow: rgba(50, 50, 93, 0.14902) 0px 1px 3px,
        rgba(0, 0, 0, 0.0196078) 0px 1px 0px;
        border-radius: 4px;
        background: white;
    }

    .focus {
        box-shadow: rgba(50, 50, 93, 0.109804) 0px 4px 6px,
        rgba(0, 0, 0, 0.0784314) 0px 1px 3px;
        --webkit-transition: all 150ms ease;
        transition: all 150ms ease;
    }
</style>
