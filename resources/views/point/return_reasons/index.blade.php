@php $titlePage = __('Return reasons') @endphp
@extends('layouts.app')
@section('title', $titlePage)
@section('content')
    @unless(auth()->user()->hasRole('admin') || auth()->user()->hasPermission('Return requests'))
  <script>
            alert("You do not have the necessary permissions to access this page.");
            window.location = "{{ route('dashboard') }}";
        </script>
        <?php exit; ?>
    @endunless
    <div class="table-responsive mt-1">
        <table class="table table-hover-animation mb-0">
            <thead>
            <tr>
                <th>Buyer</th>
                <th>Reason</th>
                <th>Comment</th>
                <th>show</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($returnReasons as $returnReason)
                <tr>
                    <td>{{ $returnReason['buyer_id'] }}</td>
                    <td>{{ $returnReason['return_reason'] }}</td>
                    <td>{{ $returnReason['comment'] }}</td>
                    <td>
                        <a href="{{ route('return-reasons.show', $returnReason['id']) }}">Show</a>
                    </td>
                    <td>
                        <form action="{{ route('return-reasons.destroy', $returnReason['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this return reason?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
