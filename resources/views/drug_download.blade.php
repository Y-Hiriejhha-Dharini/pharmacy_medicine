@if($datas)
    <table>
        <thead>
            <tr>
                <th>Drug Code</th>
                <th>Drug Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{$data['drug_code']}}</td>
                    <td>{{$data['drug_name']}}</td>
                    <td>{{$data['drug_price']}}</td>
                    <td>{{$data['quantity']}}</td>
                    <td>{{$data['status']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif