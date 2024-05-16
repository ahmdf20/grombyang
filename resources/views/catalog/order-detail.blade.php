@extends('layouts._default.app')
@section('content')
<main class="main-wrapper">

    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <form
                action="{{ route('order.checkout', ['transaction' => $transaction->id]) }}"
                method="post"
                onsubmit="handleSubmit(event, {{ $transaction->id }})"
            >
                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
                            <div class="form-group">
                                <label>Full Name <span>*</span></label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ $transaction->user?->name }}"
                                    readonly
                                >
                            </div>
                            <div class="form-group">
                                <label>Email <span>*</span></label>
                                <input
                                    type="text"
                                    id="email"
                                    name="email"
                                    value="{{ $transaction->user?->email }}"
                                    readonly
                                >
                            </div>
                            <div class="form-group">
                                <label>Province <span>*</span></label>
                                <select
                                    id="province"
                                    name="province"
                                    onchange="handleChangeProvince()"
                                >
                                </select>
                            </div>
                            <div
                                class="form-group"
                                id="section_city"
                                hidden
                            >
                                <label>Town/ City <span>*</span></label>
                                <select
                                    id="city"
                                    name="city"
                                    onchange="handleChangeCity()"
                                >
                                </select>
                            </div>
                            <div
                                class="form-group"
                                id="section_shipping"
                                hidden
                            >
                                <label>Shipping <span>*</span></label>
                                @php
                                $shippings = [
                                ['name' => 'jne', 'label' => 'JNE'],
                                ['name' => 'tiki', 'label' => 'TIKI'],
                                ['name' => 'pos', 'label' => 'POS Indonesia']
                                ]
                                @endphp
                                <select
                                    id="shipping"
                                    name="shipping"
                                    onchange="handleChangeShipping()"
                                >
                                    <option value="pilih">-- Pilih --</option>
                                    @foreach ($shippings as $shipping)
                                    <option value="{{ $shipping['name'] }}">{{ $shipping['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div
                                class="form-group"
                                id="section_service"
                                hidden
                            >
                                <label>Service <span>*</span></label>
                                <select
                                    id="service"
                                    name="service"
                                    onchange="handleChangeService()"
                                >
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Other Notes (optional)</label>
                                <textarea
                                    id="notes"
                                    rows="2"
                                    placeholder="Notes about your order, e.g. speacial notes for delivery."
                                ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Your Order</h5>
                            <small class="text-secondary">Order ID : {{ $transaction->invoice }}</small>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction->order as $key => $order)
                                        <tr class="order-product">
                                            <td>{{ $order->product->name }}
                                                <span class="quantity">x{{ $order->qty }}</span>
                                            </td>
                                            <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                                        </tr>
                                        <input
                                            type="hidden"
                                            name="weight"
                                            id="weight"
                                            value="{{ $transaction->order->sum('qty') * ($order?->product?->sum('weight') * 100)}}"
                                        >
                                        <input
                                            type="hidden"
                                            name="qty"
                                            id="qty"
                                            value="{{ $order->qty }}"
                                        >
                                        @endforeach
                                        <tr class="order-shipping">
                                            <td colspan="2">
                                                <div class="shipping-amount">
                                                    <span class="title">Shipping</span>
                                                    <span
                                                        class="amount"
                                                        id="cost"
                                                    >Rp. 0</span>
                                                </div>
                                                <input
                                                    hidden
                                                    id="cost_hidden"
                                                    name="cost_hidden"
                                                    value="0"
                                                    readonly
                                                />
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount">
                                                <span id="total">Rp.
                                                    {{ number_format($transaction->order->sum('total'), 0, ',', '.') }}</span>
                                                <input
                                                    type="hidden"
                                                    value="{{ $transaction->order->sum('total') }}"
                                                    id="total_hidden"
                                                    readonly
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button
                                type="submit"
                                class="axil-btn btn-bg-primary checkout-btn"
                            >Process to Checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->

</main>

<script>
    $(document).ready(function() {
        loadProvince()
    });

    function loadProvince()
    {
        $.ajax({
            url: `{{ config('app.url') }}/raja-ongkir/province`,
            method: 'GET',
            success: (response) => {
                let html = `<option value="pilih">-- Pilih --</pilih>`
                response.forEach((data, index) => {
                    html += `<option value="${data.province_id}">${data.province}</option>`
                })
                $('#province').html(html)
            },
            error: (error) => console.error(error)
        })
    }

    function loadCity(id)
    {
        $.ajax({
            url: `{{ config('app.url') }}/raja-ongkir/city/${id}`,
            method: 'GET',
            success: (response) => {
                let html = ``
                // console.log(response)
                response.forEach((data, index) => {
                    html += `<option value="${data.city_id}">${data.city_name}</option>`
                })
                $('#city').html(html)
            }
        })
    }

    function loadService()
    {
        let city = parseInt($('#city').val())
        let weight = parseInt($('#weight').val())
        let shipping = $('#shipping').val()
        $.ajax({
            url: `{{ config('app.url') }}/raja-ongkir/shipping/${city}/${weight}/${shipping}`,
            method: 'GET',
            success: (response) => {
                let html = `<option value="pilih">-- Pilih --</pilih>`
                console.log(response[0].costs)
                response[0].costs.forEach((data, index) => {
                    html += `<option value="${data.cost[0].value}">${data.service} (${data.description})</option>`
                })
                $('#service').html(html)
            },
            error: (error) => console.error(error)
        })
    }

    function handleChangeProvince()
    {
        let province = $('#province').val()
        if (province == 'pilih') {
            $('#section_city').attr('hidden', true)
        } else {
            loadCity(province)
            $('#section_city').removeAttr('hidden')
        }
    }

    function handleChangeCity()
    {
        let city = $('#city').val()
        if (city == 'pilih') {
            $('#section_shipping').attr('hidden', true)
        } else {
            // laodShipping()
            $('#section_shipping').removeAttr('hidden')
        }
    }

    function handleChangeShipping()
    {
        let shipping = $('#shipping').val()
        if (shipping == 'pilih') {
            $('#section_service').attr('hidden', true)
        } else {
            loadService()
            $('#section_service').removeAttr('hidden')
        }
    }

    function handleChangeService()
    {
        let service = $('#service').val()
        let cost = parseInt($('#cost_hidden').val())
        let total = parseInt($('#total_hidden').val())
        if (service == 'pilih') {
            let currency_cost = Intl.NumberFormat('id-ID').format(cost)
            let currency_total = Intl.NumberFormat('id-ID').format(total)
            $('#cost_hidden').val(cost)
            $('#total_hidden').val(total)
            $('#cost').text(`Rp. ${currency_cost}`)
            $('#total').text(`Rp. ${currency_total}`)
        } else {
            cost += parseInt(service)
            total += cost
            let currency_cost = Intl.NumberFormat('id-ID').format(cost)
            let currency_total = Intl.NumberFormat('id-ID').format(total)
            $('#cost').text(`Rp. ${currency_cost}`)
            $('#total').text(`Rp. ${currency_total}`)
            $('#cost_hidden').val(cost)
            $('#total_hidden').val(total)
        }
        // let total = parseInt($('#total').val())
        // let qty = parseInt($('#qty').val())
        // let service = parseInt($('#service').val())
        // let cost = parseInt($('#cost').val())
        // if (service == 'pilih') {
        //     let currency_total = Intl.NumberFormat('id-ID').format(total)
        //     let currency_cost = Intl.NumberFormat('id-ID').format(cost)
        //     $('#cost').text(`Rp. ${currency_cost}`)
        //     $('#total').text(`Rp. ${currency_total}`)
        //     $('#cost_hidden').val(cost)
        //     $('#total_hidden').val(total)
        // } else {
        //     cost += service
        //     total += cost
        //     let currency_total = Intl.NumberFormat('id-ID').format(total)
        //     let currency_cost = Intl.NumberFormat('id-ID').format(cost)
        //     $('#cost').text(`Rp. ${currency_total}`)
        //     $('#cost_hidden').val(cost)
        //     $('#total_hidden').val(total)
        //     $('#cost').text(`Rp. ${currency_cost}`)
        // }
    }

    function handleSubmit(event, id)
    {
        event.preventDefault();
        $.ajax({
            url: `{{ config('app.url') }}/transaction/checkout/${id}`,
            method: `POST`,
            data: {
                _token: `{{ csrf_token() }}`,
                _method: `POST`,
                total: $('#total_hidden').val(),
                province: $('#province').val(),
                city: $('#city').val(),
            },
            success: (response) => {
                console.log(response)
            },
            error: (error) => console.error(error)
        });
    }
</script>

@endsection
