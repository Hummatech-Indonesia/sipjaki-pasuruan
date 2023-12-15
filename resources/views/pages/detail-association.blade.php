@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <span class="badge text-white fs-6 mb-2" style="background-color: #1B3061">Profile Asosiasi</span>
        <h4>{{ $association->name }}</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Email:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-project_value">{{ $association->email }}</span></td>
                </tr>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Telepon:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-physical_progress"></span>{{ $association->phone_number }}
                    </td>
                </tr>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Alamat:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-finance_progress">{{ $association->address }}</span></td>
                </tr>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Kota/Kab:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-status">{{ $association->city }}</span></td>
                </tr>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Kode Pos:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-service_provider_name">{{ $association->postal_code }}</span></td>
                </tr>
            </tbody>
        </table>
        <span class="badge badge-sipjaki text-white fs-6 mb-2">Ketua Asosiasi</span>
        <h4>{{ $association->leader }}</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Email:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-project_value">{{ $association->email_leader }}</span></td>
                </tr>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Telepon:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-physical_progress"></span>{{ $association->phone_number_leader }}
                    </td>
                </tr>
                <tr>
                    <td class="text-dark" style="font-weight: bold;">Alamat:</td>
                    <td class="text-dark" style="font-weight: 500;"><span
                            id="detail-finance_progress">{{ $association->address_leader }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection