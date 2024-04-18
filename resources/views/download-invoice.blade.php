<!DOCTYPE html>
<html lang="en">


<body>
<h1>Invoice</h1>
<div class="container">
    <div class="sender-column">
        <h1>Invoice:{{$invoice_no}}</h1>
        <h1>{{$invoice_date}}</h1>
        <h1>{{$due_date}}</h1>
        <h2>Sender Data</h2>
    </div>
    <div class="recipient-column">
        <h2>Recipient Data</h2>
        <table>
            <tbody>
            <tr>
            <td>{{ $recipient_data['company_name'] ?? '' }}</td>
            </tr>
            <tr>
                <td>{{ $recipient_data['company_reg_number'] ?? '' }}</td>
            </tr>
            <tr>
                <td>{{ $recipient_data['vat_number'] ?? '' }}</td>
            </tr>
            <tr>
                <td>{{ $recipient_data['attention_to'] ?? '' }}</td>
            </tr>
            <tr>
                <td>{{ $recipient_data['address'] ?? '' }}</td>
            </tr>
            <tr>
                <td>{{ $recipient_data['phone_number'] ?? '' }}</td>
            </tr>
            <tr>
                <td>{{ $recipient_data['email'] ?? '' }}</td>
            </tr>
            <tr>
                <td>{{ $recipient_data['contact_person'] ?? '' }}</td>
            </tr>

            </tbody>
        </table>
    </div>

    {{ $name }}
    {{ $unit_price }}
    {{ $quantity }}
    {{ $tax }}
    {{ $sub_total }}


</div>
</body>
</html>
