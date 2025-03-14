@extends('web.master.layout')
@section('content')
    <div class=" py-5">
        <div class="container-fluid">
            <h1 class="mb-4">All Created Design</h1>
            <div class="row">
                <div class="col-md-12">
                    <table class="table ranktable table-striped" id="example">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">#</th>
                                <th scope="col">Creator Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Design Link</th> --}}
                                <th scope="col">View Design</th>
                                      <th scope="col">Creation Date</th>
                                <th scope="col">Link</th>
                                           <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designs as $key => $design)
                                <tr style="text-align: center;">
                                    <td>{{ $key + 1 }}</td>
                                          <td>{{ $design->users->name }}</td>
                                                 <td>{{ $design->design_name }}</td>
                                    <td>{{ $design->design_email }}</td>
                                    {{-- <td><strong><a href="#"> Link</a></strong></td> --}}
                                    <td>
                                        <a href="view_design/{{ $design->generated_key }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            $createdAt = \Carbon\Carbon::parse($design->created_at);
                                            $now = \Carbon\Carbon::now();
                                        @endphp

                                        @if ($createdAt->isToday())
                                            Today {{ $createdAt->format('g:i A') }}
                                        @elseif ($createdAt->isYesterday())
                                            Yesterday {{ $createdAt->format('g:i A') }}
                                        @else
                                            {{ $createdAt->format('M d, Y g:i A') }}
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary"
                                            onclick="copyLink('{{ url('view_design/' . $design->generated_key) }}')">
                                            <i class="fa fa-copy"></i> Copy Link
                                        </button>
                                    </td>
                                        <td>
                                       <a href="delete_alldesign/{{ $design->generated_key }}" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete?')">
                                            <span style="color: white;"><i class="fa-solid fa-trash"></i></span>
                                        </a>
                                        <a href="edit_design/{{ $design->generated_key }}" class="btn btn-danger">
                                            <span style="color: white;"><i class="fa-solid fa-edit"></i></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
    
            // DataTable initialisation
            $('#example').DataTable({
                "dom": '<"dt-buttons"Bf><"clear">lirtp',
                "paging": true,
                "autoWidth": true,
                "buttons": [

                ]
            });
        });

        function copyLink(link) {
            // Create a temporary input element to copy the text
            const tempInput = document.createElement('input');
            tempInput.value = link; // Set the link as the input value
            document.body.appendChild(tempInput); // Add the input to the DOM
            tempInput.select(); // Select the text in the input
            document.execCommand('copy'); // Execute the copy command
            document.body.removeChild(tempInput); // Remove the input element from the DOM

            // Optionally, show a success message
            alert('Link copied to clipboard: ' + link);
        }
    </script>
@endsection
