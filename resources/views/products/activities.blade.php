<x-layout>
    <h1>Products Activities</h1>
    <table>
        <thead>
        <tr>
            <th>Subject</th>
            <th>Causer</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activities as $activity)
            <tr>
                <td>{{$activity->changes}}</td>
                <td>{{$activity->causer->username}}</td>
                <td>{{$activity->description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>
