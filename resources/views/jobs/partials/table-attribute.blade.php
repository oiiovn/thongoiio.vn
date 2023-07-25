<table id="tableTotalMoney" class="table table-transparent table-responsive mb-0">
    <tbody>
        <tr>
            <td>{{ __('Phí dịch vụ') }}</td>
            <td class="total-money">{{ format_price($total_money ?? 0) }}</td>
        </tr>
        {{-- <tr>
            <td>{{ __('Tiền mua sản phẩm') }}</td>
            <td>
                <span class="money-product">{{ format_price($money_product ?? 0) }}</span>
            </td>
        </tr> --}}
        <tr>
            <td>{{ __('Tiền cọc') }}</td>
            <td>
                <span class="money-product-addition">{{ format_price($money_product_addition ?? 0) }}</span>
            </td>
        </tr>
        <tr class="fw-bold">
            <td>{{ __('Tổng phí') }}</td>
            <td>
                <span class="total">{{ format_price($total ?? 0) }}</span>
            </td>
        </tr>
    </tbody>
</table>