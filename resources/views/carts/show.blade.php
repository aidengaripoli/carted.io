@extends('layouts.app')

@section('content')
    <div class="image-hero">
        <p class="image">
            <img src="{{ $cart->image_url }}">
        </p>
    </div>

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="card">
                        <div class="card-content">
                            <div class="content">
                                <div class="level">
                                    <div class="level-item has-text-centered">
                                        <div>
                                            <p class="heading">
                                                Size
                                            </p>
                                            <p class="title">
                                                US {{ $cart->size }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="level-item has-text-centered">
                                        <div>
                                            <p class="heading">
                                                Price
                                            </p>
                                            <p class="title">
                                                ${{ $cart->price / 100 }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="level-item has-text-centered">
                                        <div>
                                            <p class="heading">
                                                Site
                                            </p>
                                            <p class="title">
                                                {{ $cart->site }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <h1 class="title has-text-centered is-uppercase">
                        {{ $cart->name }}
                    </h1>

                    <div class="columns">
                        <div class="column is-6 is-offset-3">
                            @if($cart->isActive())
                                <div class="card">
                                    <div class="card-content">
                                        <div class="content">
                                            <payment-form
                                                url="{{ $cart->path() }}/purchase"
                                                :amount="{{ $cart->price }}">
                                            </payment-form>
                                            <payment-selection
                                                url="{{ $cart->path() }}/purchase"
                                                :amount="{{ $cart->price }}">
                                            </payment-selection>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="notification is-danger has-text-centered">
                                    This cart is no longer available.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import PaymentSelection from "../../assets/js/components/PaymentSelection"
    export default {
        components: {PaymentSelection}
    }
</script>
