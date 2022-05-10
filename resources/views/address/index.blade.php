@extends('layouts.app')
@section('content')

{{------------ Create Form ----------------}}
<div class="p-3">
    <form action="{{ route('address.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleName">Name</label>
            <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" id="inputName" aria-describedby="emailHelp" placeholder="Enter name">
            <small id="nameHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
        </div>

        @error('user_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exampleName">Phone No</label>
            <input type="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" id="inputPhone" aria-describedby="emailHelp" placeholder="Enter phone no.">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone no with anyone else.</small>
        </div>

        @error('tel')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exampleName">Address</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="inputAddress" aria-describedby="emailHelp" placeholder="Enter address">
            <small id="addressHelp" class="form-text text-muted">We'll never share your address with anyone else.</small>
        </div>

        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<hr>
{{------------ Create Form ----------------}}

{{------------ Data tables ----------------}}

<div class="p-3">
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone No</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Created By</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php $id=0; ?>
        @foreach($addresses as $address)
        <tr>
            <td>{{ $id+=1 }}</td>
            <td>{{ $address->user_name }}</td>
            <td>{{ $address->tel }}</td>
            <td>{{ $address->address }}</td>
            <td>{{ $address->created_at ->format('d/m/y') }}</td>
            <td>{{ \App\User::find($address->user_id)->name }}</td>
            <td><a href="{{ route('address.edit', $address->id) }}" class="btn btn-outline-info">Edit</a></td>
            <td>
            <form action="{{  route('address.destroy', $address->id) }}" method="post">
                @method('delete')
                {{ csrf_field() }}
                <input type="submit" class="btn btn-outline-danger" value="Delete">
            </form>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection

